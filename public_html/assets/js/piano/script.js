$(function() {

    var test_mode = (window.location.hash && window.location.hash.match(/^(?:#.+)*#test(?:#.+)*$/i));

    var gSeeOwnCursor = (window.location.hash && window.location.hash.match(/^(?:#.+)*#seeowncursor(?:#.+)*$/i));

    var gMidiOutTest = (window.location.hash && window.location.hash.match(/^(?:#.+)*#midiout(?:#.+)*$/i)); // todo this is no longer needed

    if (!Array.prototype.indexOf) {
        Array.prototype.indexOf = function(elt /*, from*/) {
            var len = this.length >>> 0;
            var from = Number(arguments[1]) || 0;
            from = (from < 0) ? Math.ceil(from) : Math.floor(from);
            if (from < 0) from += len;
            for (; from < len; from++) {
                if (from in this && this[from] === elt) return from;
            }
            return -1;
        };
    }

    window.requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame
        || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame
        || function (cb) { setTimeout(cb, 1000 / 30); };

    var DEFAULT_VELOCITY = 0.5;
    var TIMING_TARGET = 1000;

    // Utility
    var Rect = function(x, y, w, h) {
        this.x = x;
        this.y = y;
        this.w = w;
        this.h = h;
        this.x2 = x + w;
        this.y2 = y + h;
    };
    Rect.prototype.contains = function(x, y) {
        return (x >= this.x && x <= this.x2 && y >= this.y && y <= this.y2);
    };

    // AudioEngine classes

    var AudioEngine = function() {
    };

    AudioEngine.prototype.init = function(cb) {
        this.volume = 0.6;
        this.sounds = {};
        return this;
    };

    AudioEngine.prototype.load = function(id, url, cb) {
    };

    AudioEngine.prototype.play = function() {
    };

    AudioEngine.prototype.stop = function() {
    };

    AudioEngine.prototype.setVolume = function(vol) {
        this.volume = vol;
    };


    AudioEngineSM2 = function() {
    };

    AudioEngineSM2.prototype = new AudioEngine();

    AudioEngineSM2.prototype.init = function(cb) {
        AudioEngine.prototype.init.call(this);

        window.SM2_DEFER = true;
        var script = document.createElement("script");
        script.src = "/soundmanager2/soundmanager2.js";

        var loaded = false;
        script.onload = function() {
            if(loaded) return;
            if(typeof SoundManager === "undefined") {
                setTimeout(script.onload, 4000);
                return;
            }
            loaded = true;
            
            window.soundManager = new SoundManager();
            soundManager.url = "/soundmanager2/";
            soundManager.debugMode = test_mode ? true : false;
            soundManager.useHTML5Audio = false;
            soundManager.flashVersion = 9;
            soundManager.multiShot = true;
            soundManager.useHighPerformance = true;
            soundManager.beginDelayedInit();
            if(cb) soundManager.onready(cb);
        };
        setTimeout(script.onload, 4000);

        document.body.appendChild(script);
        return this;
    };

    AudioEngineSM2.prototype.load = function(id, url, cb) {
        this.sounds[id] = soundManager.createSound({
            id: id,
            url: url,
            autoLoad: true,
            volume: this.volume,
            onload: cb
        });
    };

    AudioEngineSM2.prototype.play = function(id, vol, delay_ms) {
        var self = this;
        setTimeout(function() {
            soundManager.play(id, {volume: self.volume * 100.0});
        }, delay_ms);
    };

    AudioEngineSM2.prototype.setVolume = function(vol) {
        AudioEngine.prototype.setVolume.call(this, vol);
        for(var i in this.sounds) {
            if(this.sounds.hasOwnProperty(i)) {
                this.sounds[i].setVolume(this.volume * 100.0);
            }
        }
    };


    AudioEngineWeb = function() {
        this.threshold = 10;
        //this.worker = new Worker(domain+"assets/js/piano/workerTimer.js"); //must be same origin
        var self = this;
        /*this.worker.onmessage = function(event)
            {
                if(event.data.args)
                if(event.data.args.action==0)
                {
                    self.actualPlay(event.data.args.id, event.data.args.vol, event.data.args.time, event.data.args.part_id);
                }
                else
                {
                    self.actualStop(event.data.args.id, event.data.args.time, event.data.args.part_id);
                }
            }*/
    };

    AudioEngineWeb.prototype = new AudioEngine();

    AudioEngineWeb.prototype.init = function(cb) {
        AudioEngine.prototype.init.call(this);
        this.context = new AudioContext();
        this.gainNode = this.context.createGain();
        this.gainNode.connect(this.context.destination);
        this.gainNode.gain.value = this.volume;
        this.playings = {};
        if(cb) setTimeout(cb, 0);
        return this;
    };

    AudioEngineWeb.prototype.load = function(id, url, cb) {
        var audio = this;
        var req = new XMLHttpRequest();
        req.open("GET", url);
        req.responseType = "arraybuffer";
        req.addEventListener("readystatechange", function(evt) {
            if(req.readyState !== 4) return;
            try {
                audio.context.decodeAudioData(req.response, function(buffer) {
                    audio.sounds[id] = buffer;
                    if(cb) cb();
                });
            } catch(e) {
                /*throw new Error(e.message
                    + " / id: " + id
                    + " / url: " + url
                    + " / status: " + req.status
                    + " / ArrayBuffer: " + (req.response instanceof ArrayBuffer)
                    + " / byteLength: " + (req.response && req.response.byteLength ? req.response.byteLength : "undefined"));*/
                new Notification({id: "audio-download-error", title: "Problem", text: "For some reason, an audio download failed with a status of " + req.status + ". ",
                    target: "#piano", duration: 10000});
            }
        });
        req.send();
    };

    AudioEngineWeb.prototype.actualPlay = function(id, vol, time, part_id) { //the old play(), but with time insted of delay_ms.
        if(!this.sounds.hasOwnProperty(id)) return;
        var source = this.context.createBufferSource();
        source.buffer = this.sounds[id];
        var gain = this.context.createGain();
        gain.gain.value = vol;
        source.connect(gain);
        gain.connect(this.gainNode);
        source.start(time);
        // Patch from ste-art remedies stuttering under heavy load
        if(this.playings[id]) {
            var playing = this.playings[id];
            playing.gain.gain.setValueAtTime(playing.gain.gain.value, time);
            playing.gain.gain.linearRampToValueAtTime(0.0, time + 0.2);
            playing.source.stop(time + 0.21);
        }
        this.playings[id] = {"source": source, "gain": gain, "part_id": part_id};
    }
    
    AudioEngineWeb.prototype.play = function(id, vol, delay_ms, part_id)
    {
        if(!this.sounds.hasOwnProperty(id)) return;
        var time = this.context.currentTime + (delay_ms / 1000); //calculate time on note receive.
        var delay = delay_ms - this.threshold;
        if(delay<=0) this.actualPlay(id, vol, time, part_id);
        else {
            this.worker.postMessage({delay:delay,args:{action:0/*play*/,id:id, vol:vol, time:time, part_id:part_id}}); // but start scheduling right before play.
        }
    }
    
    AudioEngineWeb.prototype.actualStop = function(id, time, part_id) {
        if(this.playings.hasOwnProperty(id) && this.playings[id] && this.playings[id].part_id === part_id) {
            var gain = this.playings[id].gain.gain;
            gain.setValueAtTime(gain.value, time);
            gain.linearRampToValueAtTime(gain.value * 0.1, time + 0.16);
            gain.linearRampToValueAtTime(0.0, time + 0.4);
            this.playings[id].source.stop(time + 0.41);
            this.playings[id] = null;
        }
    };

    AudioEngineWeb.prototype.stop = function(id, delay_ms, part_id) {
            var time = this.context.currentTime + (delay_ms / 1000);
            var delay = delay_ms - this.threshold;
            if(delay<=0) this.actualStop(id, time, part_id);
            else {
                this.worker.postMessage({delay:delay,args:{action:1/*stop*/, id:id, time:time, part_id:part_id}});
            }
    };

    AudioEngineWeb.prototype.setVolume = function(vol) {
        AudioEngine.prototype.setVolume.call(this, vol);
        this.gainNode.gain.value = this.volume;
    };

    // Renderer classes

    var Renderer = function() {
    };

    Renderer.prototype.init = function(piano) {
        this.piano = piano;
        this.resize();
        return this;
    };

    Renderer.prototype.resize = function(width, height) {
        if(typeof width == "undefined") width = $(this.piano.rootElement).width();
        if(typeof height == "undefined") height = Math.floor(width * 0.25);
	if(width < 600){
		height = Math.floor(width * 0.5);
	}
        $(this.piano.rootElement).css({"height": height + "px", marginTop: Math.floor($(window).height()  - height ) + "px"});
        $("#piano2").css({marginTop: Math.floor($(window).height()  - height*1.6 ) + "px"});
	this.width = width;
        this.height = height;
    };

    Renderer.prototype.visualize = function(key, color) {
    };

    var DOMRenderer = function() {
        Renderer.call(this);
    };

    DOMRenderer.prototype = new Renderer();

    DOMRenderer.prototype.init = function(piano) {
        // create keys in dom
        for(var i in piano.keys) {
            if(!piano.keys.hasOwnProperty(i)) continue;
            var key = piano.keys[i];
            var ele = document.createElement("div");
            key.domElement = ele;
            piano.rootElement.appendChild(ele);
            // "key sharp cs cs2"
            ele.note = key.note;
            ele.id = key.note;
            ele.className = "key " + (key.sharp ? "sharp " : " ") + key.baseNote + " " + key.note + " loading";
            var table = $('<table width="100%" height="100%" style="pointer-events:none"></table>');
            var td = $('<td valign="bottom"></td>');
            table.append(td);
            td.valign = "bottom";
            $(ele).append(table);
        }
        // add event listeners
        var mouse_down = false;
        $(piano.rootElement).mousedown(function(event) {
            // todo: IE10 doesn't support the pointer-events css rule on the "blips"
            var ele = event.target;
            if($(ele).hasClass("key") && piano.keys.hasOwnProperty(ele.note)) {
                var key = piano.keys[ele.note];
                press(key.note);
                mouse_down = true;
                event.stopPropagation();
            };
            //event.preventDefault();
        });
        piano.rootElement.addEventListener("touchstart", function(event) {
            for(var i in event.changedTouches) {
                var ele = event.changedTouches[i].target;
                if($(ele).hasClass("key") && piano.keys.hasOwnProperty(ele.note)) {
                    var key = piano.keys[ele.note];
                    press(key.note);
                    mouse_down = true;
                    event.stopPropagation();
                }
            }
            //event.preventDefault();
        }, false);
        $(window).mouseup(function(event) {
            mouse_down = false;
        });
        /*$(piano.rootElement).mouseover(function(event) {
            if(!mouse_down) return;
            var ele = event.target;
            if($(ele).hasClass("key") && piano.keys.hasOwnProperty(ele.note)) {
                var key = piano.keys[ele.note];
                press(key.note);
            }
        });*/

        Renderer.prototype.init.call(this, piano);
        return this;
    };

    DOMRenderer.prototype.resize = function(width, height) {
        Renderer.prototype.resize.call(this, width, height);
    };

    DOMRenderer.prototype.visualize = function(key, color) {
        var k = $(key.domElement);
        k.addClass("play");
        setTimeout(function(){
            k.removeClass("play");
        }, 100);
        // "blips"
        var d = $('<div style="width:100%;height:10%;margin:0;padding:0">&nbsp;</div>');
        d.css("background", color);
        k.find("td").append(d);
        d.fadeOut(1000, function(){
            d.remove();
        });
    };

    var CanvasRenderer = function() {
        Renderer.call(this);
    };

    CanvasRenderer.prototype = new Renderer();

    CanvasRenderer.prototype.init = function(piano) {
        this.canvas = document.createElement("canvas");
        this.ctx = this.canvas.getContext("2d");
        piano.rootElement.appendChild(this.canvas);

        Renderer.prototype.init.call(this, piano); // calls resize()

        // create render loop
        var self = this;
        var render = function() {
            self.redraw();
            requestAnimationFrame(render);
        };
        requestAnimationFrame(render);

        // add event listeners
        var mouse_down = false;
        var last_key = null;
        $(piano.rootElement).mousedown(function(event) {
            mouse_down = true;
            //event.stopPropagation();
            event.preventDefault();

            var pos = CanvasRenderer.translateMouseEvent(event);
            var hit = self.getHit(pos.x, pos.y);
            if(hit) {
                press(hit.key.note, hit.v);
                last_key = hit.key;
            }
        });
        piano.rootElement.addEventListener("touchstart", function(event) {
            mouse_down = true;
            //event.stopPropagation();
            event.preventDefault();
            for(var i in event.changedTouches) {
                var pos = CanvasRenderer.translateMouseEvent(event);
                var hit = self.getHit(pos.x, pos.y);
                if(hit) {
                    press(hit.key.note, hit.v);
                    last_key = hit.key;
                }
            }
        }, false);
        $(window).mouseup(function(event) {
            if(last_key) {
                release(last_key.note);
            }
            mouse_down = false;
            last_key = null;
        });
        /*$(piano.rootElement).mousemove(function(event) {
            if(!mouse_down) return;
            var pos = CanvasRenderer.translateMouseEvent(event);
            var hit = self.getHit(pos.x, pos.y);
            if(hit && hit.key != last_key) {
                press(hit.key.note, hit.v);
                last_key = hit.key;
            }
        });*/

        return this;
    };

    CanvasRenderer.prototype.resize = function(width, height) {
        Renderer.prototype.resize.call(this, width, height);
        if(this.width < 52 * 2) this.width = 52 * 2;
        if(this.height < this.width * 0.2) this.height = Math.floor(this.width * 0.2);
        this.height = this.height /2;
        this.canvas.width = this.width;
        this.canvas.height = this.height;
        
        // calculate key sizes
	lebar = $(this.piano.rootElement).width();
        if(lebar <= 600){
        	this.whiteKeyWidth = Math.floor(this.width / 24);
	}else{
		this.whiteKeyWidth = Math.floor(this.width / 30.5);
	}
        this.whiteKeyHeight = Math.floor(this.height * 0.9);
        this.blackKeyWidth = Math.floor(this.whiteKeyWidth * 0.75);
        this.blackKeyHeight = Math.floor(this.height * 0.5);

        this.blackKeyOffset = Math.floor(this.whiteKeyWidth - (this.blackKeyWidth / 2));
        this.keyMovement = Math.floor(this.whiteKeyHeight * 0.015);

        this.whiteBlipWidth = Math.floor(this.whiteKeyWidth * 0.7);
        this.whiteBlipHeight = Math.floor(this.whiteBlipWidth * 0.8);
        this.whiteBlipX = Math.floor((this.whiteKeyWidth - this.whiteBlipWidth) / 2);
        this.whiteBlipY = Math.floor(this.whiteKeyHeight - this.whiteBlipHeight * 1.2);
        this.blackBlipWidth = Math.floor(this.blackKeyWidth * 0.7);
        this.blackBlipHeight = Math.floor(this.blackBlipWidth * 0.8);
        this.blackBlipY = Math.floor(this.blackKeyHeight - this.blackBlipHeight * 1.2);
        this.blackBlipX = Math.floor((this.blackKeyWidth - this.blackBlipWidth) / 2);
        
        // prerender white key
        this.whiteKeyRender = document.createElement("canvas");
        this.whiteKeyRender.width = this.whiteKeyWidth;
        this.whiteKeyRender.height = this.height + 10;
        var ctx = this.whiteKeyRender.getContext("2d");
        if(ctx.createLinearGradient) {
            var gradient = ctx.createLinearGradient(0, 0, 0, this.whiteKeyHeight);
            gradient.addColorStop(0, "#eee");
            gradient.addColorStop(0.75, "#fff");
            gradient.addColorStop(1, "#dad4d4");
            ctx.fillStyle = gradient;
        } else {
            ctx.fillStyle = "#fff";
        }
        ctx.strokeStyle = "#000";
        ctx.lineJoin = "round";
        ctx.lineCap = "round";
        ctx.lineWidth = 10;
        ctx.strokeRect(ctx.lineWidth / 2, ctx.lineWidth / 2, this.whiteKeyWidth - ctx.lineWidth, this.whiteKeyHeight - ctx.lineWidth);
        ctx.lineWidth = 4;
        ctx.fillRect(ctx.lineWidth / 2, ctx.lineWidth / 2, this.whiteKeyWidth - ctx.lineWidth, this.whiteKeyHeight - ctx.lineWidth);
        
        // prerender black key
        this.blackKeyRender = document.createElement("canvas");
        this.blackKeyRender.width = this.blackKeyWidth + 10;
        this.blackKeyRender.height = this.blackKeyHeight + 10;
        var ctx = this.blackKeyRender.getContext("2d");
        if(ctx.createLinearGradient) {
            var gradient = ctx.createLinearGradient(0, 0, 0, this.blackKeyHeight);
            gradient.addColorStop(0, "#000");
            gradient.addColorStop(1, "#444");
            ctx.fillStyle = gradient;
        } else {
            ctx.fillStyle = "#000";
        }
        ctx.strokeStyle = "#222";
        ctx.lineJoin = "round";
        ctx.lineCap = "round";
        ctx.lineWidth = 8;
        ctx.strokeRect(ctx.lineWidth / 2, ctx.lineWidth / 2, this.blackKeyWidth - ctx.lineWidth, this.blackKeyHeight - ctx.lineWidth);
        ctx.lineWidth = 4;
        ctx.fillRect(ctx.lineWidth / 2, ctx.lineWidth / 2, this.blackKeyWidth - ctx.lineWidth, this.blackKeyHeight - ctx.lineWidth);

        // prerender shadows
        this.shadowRender = [];
        var y = -this.canvas.height * 2;
        for(var j = 0; j < 2; j++) {
            var canvas = document.createElement("canvas");
            this.shadowRender[j] = canvas;
            canvas.width = this.canvas.width;
            canvas.height = this.canvas.height;
            var ctx = canvas.getContext("2d");
            var sharp = j ? true : false;
            ctx.lineJoin = "round";
            ctx.lineCap = "round";
            ctx.lineWidth = 1;
            ctx.shadowColor = "rgba(0, 0, 0, 0.5)";
            ctx.shadowBlur = this.keyMovement * 3;
            ctx.shadowOffsetY = -y + this.keyMovement;
            if(sharp) {
                ctx.shadowOffsetX = this.keyMovement;
            } else {
                ctx.shadowOffsetX = 0;
                ctx.shadowOffsetY = -y + this.keyMovement;
            }

            for(var i in this.piano.keys) {
                if(!this.piano.keys.hasOwnProperty(i)) continue;
                var key = this.piano.keys[i];
                if(key.sharp != sharp) continue;

                if(key.sharp) {
                    ctx.fillRect(this.blackKeyOffset + this.whiteKeyWidth * key.spatial + ctx.lineWidth / 2,
                        y + ctx.lineWidth / 2,
                        this.blackKeyWidth - ctx.lineWidth, this.blackKeyHeight - ctx.lineWidth);
                } else {
                    ctx.fillRect(this.whiteKeyWidth * key.spatial + ctx.lineWidth / 2,
                        y + ctx.lineWidth / 2,
                        this.whiteKeyWidth - ctx.lineWidth, this.whiteKeyHeight - ctx.lineWidth);
                }
            }
        }

        // update key rects
        for(var i in this.piano.keys) {
            if(!this.piano.keys.hasOwnProperty(i)) continue;
            var key = this.piano.keys[i];
            if(key.sharp) {
                key.rect = new Rect(this.blackKeyOffset + this.whiteKeyWidth * key.spatial, 0,
                    this.blackKeyWidth, this.blackKeyHeight);
            } else {
                key.rect = new Rect(this.whiteKeyWidth * key.spatial, 0,
                    this.whiteKeyWidth, this.whiteKeyHeight);
            }
        }
    };

    CanvasRenderer.prototype.visualize = function(key, color) {
        key.timePlayed = Date.now();
        key.blips.push({"time": key.timePlayed, "color": color});
    };

    CanvasRenderer.prototype.redraw = function() {
        var now = Date.now();
        var timeLoadedEnd = now - 1000;
        var timePlayedEnd = now - 100;
        var timeBlipEnd = now - 1000;

        this.ctx.save();
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        // draw all keys
        for(var j = 0; j < 2; j++) {
            this.ctx.globalAlpha = 1.0;
            this.ctx.drawImage(this.shadowRender[j], 0, 0);
            var sharp = j ? true : false;
            for(var i in this.piano.keys) {
                if(!this.piano.keys.hasOwnProperty(i)) continue;
                var key = this.piano.keys[i];
                if(key.sharp != sharp) continue;

                if(!key.loaded) {
                    this.ctx.globalAlpha = 0.2;
                } else if(key.timeLoaded > timeLoadedEnd) {
                    this.ctx.globalAlpha = ((now - key.timeLoaded) / 1000) * 0.8 + 0.2;
                } else {
                    this.ctx.globalAlpha = 1.0;
                }
                var y = 0;
                if(key.timePlayed > timePlayedEnd) {
                    y = Math.floor(this.keyMovement - (((now - key.timePlayed) / 100) * this.keyMovement));
                }
                var x = Math.floor(key.sharp ? this.blackKeyOffset + this.whiteKeyWidth * key.spatial
                    : this.whiteKeyWidth * key.spatial);
                var image = key.sharp ? this.blackKeyRender : this.whiteKeyRender;
                this.ctx.drawImage(image, x, y);

                // render blips
                if(key.blips.length) {
                    var alpha = this.ctx.globalAlpha;
                    var w, h;
                    if(key.sharp) {
                        x += this.blackBlipX;
                        y = this.blackBlipY;
                        w = this.blackBlipWidth;
                        h = this.blackBlipHeight;
                    } else {
                        x += this.whiteBlipX;
                        y = this.whiteBlipY;
                        w = this.whiteBlipWidth;
                        h = this.whiteBlipHeight;
                    }
                    for(var b = 0; b < key.blips.length; b++) {
                        var blip = key.blips[b];
                        if(blip.time > timeBlipEnd) {
                            this.ctx.fillStyle = blip.color;
                            this.ctx.globalAlpha = alpha - ((now - blip.time) / 1000);
                            this.ctx.fillRect(x, y, w, h);
                        } else {
                            key.blips.splice(b, 1);
                            --b;
                        }
                        y -= Math.floor(h * 1.1);
                    }
                }
            }
        }
        this.ctx.restore();
    };

    CanvasRenderer.prototype.getHit = function(x, y) {
        for(var j = 0; j < 2; j++) {
            var sharp = j ? false : true; // black keys first
            for(var i in this.piano.keys) {
                if(!this.piano.keys.hasOwnProperty(i)) continue;
                var key = this.piano.keys[i];
                if(key.sharp != sharp) continue;
                if(key.rect.contains(x, y)) {
                    var v = y / (key.sharp ? this.blackKeyHeight : this.whiteKeyHeight);
                    v += 0.25;
                    v *= DEFAULT_VELOCITY;
                    if(v > 1.0) v = 1.0;
                    return {"key": key, "v": v};
                }
            }
        }
        return null;
    };


    CanvasRenderer.isSupported = function() {
        var canvas = document.createElement("canvas");
        return !!(canvas.getContext && canvas.getContext("2d"));
    };

    CanvasRenderer.translateMouseEvent = function(evt) {
        var element = evt.target;
        var offx = 0;
        var offy = 0;
        do {
            offx += element.offsetLeft;
            offy += element.offsetTop;
        } while(element = element.offsetParent);
        return {
            x: evt.pageX - offx,
            y: evt.pageY - offy
        }
    };

    // Pianoctor

    var PianoKey = function(note, octave) {
        this.note = note + octave;
        this.baseNote = note;
        this.octave = octave;
        this.sharp = note.indexOf("s") != -1;
        this.loaded = false;
        this.timeLoaded = 0;
        this.domElement = null;
        this.timePlayed = 0;
        this.blips = [];
    };

    var Piano = function(rootElement) {
    
        var piano = this;
        piano.rootElement = rootElement;
        piano.keys = {};
        
        var white_spatial = 0;
        var black_spatial = 0;
        var black_it = 0;
        var black_lut = [1, 2, 1, 1, 2];
        var addKey = function(note, octave) {
            var key = new PianoKey(note, octave);
            piano.keys[key.note] = key;
            if(key.sharp) {
                key.spatial = black_spatial;
                black_spatial += black_lut[black_it % 5];
                ++black_it;
            } else {
                key.spatial = white_spatial;
                ++white_spatial;
            }
        }
        if(test_mode) {
            addKey("c", 2);
        } else {
            lebar = $("#piano").width();
            if(lebar <= 600){
                addKey("a", -1);
                addKey("as", -1);
                addKey("b", -1);
                var notes = "c cs d ds e f fs g gs a as b".split(" ");
                for(var oct = 0; oct < 3; oct++) {
                    for(var i in notes) {
                        addKey(notes[i], oct);
                    }
                }
                addKey("c", 4);
                addKey("cs", 4);    
            }else{
                addKey("a", -1);
                addKey("as", -1);
                addKey("b", -1);
                var notes = "c cs d ds e f fs g gs a as b".split(" ");
                for(var oct = 0; oct < 4; oct++) {
                    for(var i in notes) {
                        addKey(notes[i], oct);
                    }
                }
                addKey("c", 4);
                addKey("cs", 4);
            }
	}

        var render_engine = CanvasRenderer.isSupported() ? CanvasRenderer : DOMRenderer;
        this.renderer = new render_engine().init(this);
        
        window.addEventListener("resize", function() {
            piano.renderer.resize();
        });


        window.AudioContext = window.AudioContext || window.webkitAudioContext || undefined;
        var audio_engine = (window.AudioContext === undefined) ? AudioEngineSM2 : AudioEngineWeb;

        // Firefox 25 supports WebAudio, but a decodeAudioData issue is blocking until 26
        // https://bugzilla.mozilla.org/show_bug.cgi?id=865553
        var search_str = " Firefox/";
        var idx = navigator.userAgent.indexOf(search_str);
        if(idx !== -1) {
            var version = parseFloat(navigator.userAgent.substring(idx + search_str.length));
            if(isNaN(version) || version < 26.0) {
                audio_engine = AudioEngineSM2;
            }
        }

        this.audio = new audio_engine().init(function() {
            for(var i in piano.keys) {
                if(!piano.keys.hasOwnProperty(i)) continue;
                (function() {
                    var key = piano.keys[i];
                    piano.audio.load(key.note, domain+ "assets/mp3/" + key.note + ".wav.mp3", function() {
                        key.loaded = true;
                        key.timeLoaded = Date.now();
                        if(key.domElement) // todo: move this to renderer somehow
                            $(key.domElement).removeClass("loading");
                    });
                })();
            }
        });
    };

    Piano.prototype.play = function(note, vol, participant, delay_ms) {
        if(!this.keys.hasOwnProperty(note)) return;
        var key = this.keys[note];
        if(key.loaded) this.audio.play(key.note, vol, delay_ms);
        if(typeof gMidiOutTest === "function") gMidiOutTest(key.note, vol * 100, delay_ms);
        var self = this;
        // var jq_namediv = $(typeof participant == "undefined" ? null : participant.nameDiv);
        // if(jq_namediv) {
            setTimeout(function() {
                self.renderer.visualize(key, "#777");
                // jq_namediv.addClass("play");
                // setTimeout(function() {
                //     jq_namediv.removeClass("play");
                // }, 30);
            }, delay_ms);
        // }
    };

    Piano.prototype.stop = function(note, participant, delay_ms) {
        if(!this.keys.hasOwnProperty(note)) return;
        var key = this.keys[note];
        if(key.loaded) this.audio.stop(key.note, delay_ms, participant.id);
        if(typeof gMidiOutTest === "function") gMidiOutTest(key.note, 0, delay_ms);
    };
    
    var gPiano = new Piano(document.getElementById("piano"));
    
    var gAutoSustain = true; //!(window.location.hash && window.location.hash.match(/^(?:#.+)*#sustain(?:#.+)*$/));
    var gSustain = false;

    var gHeldNotes = {};
    var gSustainedNotes = {};
    

    function press(id, vol) {
        // if(!gClient.preventsPlaying() && gNoteQuota.spend(1)) {
            gHeldNotes[id] = true;
            gSustainedNotes[id] = true;
            gPiano.play(id, vol !== undefined ? vol : DEFAULT_VELOCITY, null ,0);
            // gPiano.play(id, vol !== undefined ? vol : DEFAULT_VELOCITY, gClient.getOwnParticipant(), 0);
            // gClient.startNote(id, vol);
        // }
    }

    function release(id) {
        if(gHeldNotes[id]) {
            gHeldNotes[id] = false;
            if(gAutoSustain || gSustain) {
                gSustainedNotes[id] = true;
            } else {
                if(gNoteQuota.spend(1)) {
                    gPiano.stop(id, gClient.getOwnParticipant(), 0);
                    gClient.stopNote(id);
                    gSustainedNotes[id] = false;
                }
            }
        }
    }

    function pressSustain() {
        gSustain = true;
    }

    function releaseSustain() {
        gSustain = false;
        if(!gAutoSustain) {
            for(var id in gSustainedNotes) {
                if(gSustainedNotes.hasOwnProperty(id) && gSustainedNotes[id] && !gHeldNotes[id]) {
                    gSustainedNotes[id] = false;
                    if(gNoteQuota.spend(1)) {
                        gPiano.stop(id, gClient.getOwnParticipant(), 0);
                        gClient.stopNote(id);
                    }
                }
            }
        }
    }

    // Send cursor updates
    var mx = 0, last_mx = -10, my = 0, last_my = -10;
    setInterval(function() {
        if(Math.abs(mx - last_mx) > 0.1 || Math.abs(my - last_my) > 0.1) {
            last_mx = mx;
            last_my = my;
        }
    }, 50);
    $(document).mousemove(function(event) {
        mx = ((event.pageX / $(window).width()) * 100).toFixed(2);
        my = ((event.pageY / $(window).height()) * 100).toFixed(2);
    });

    var Note = function(note, octave) {
        this.note = note;
        this.octave = octave || 0;
    };

    var n = function(a, b) { return {note: new Note(a, b), held: false}; };

    var velocityFromMouseY = function() {
        return 0.1 + (my / 100) * 0.6;
    };

    // MIDI

    (function() {

        var MIDI_TRANSPOSE = -12;

        var MIDI_KEY_NAMES = ["a-1", "as-1", "b-1"];
        // var MIDI_KEY_NAMES = [];
        var bare_notes = "c cs d ds e f fs g gs a as b".split(" ");
        for(var oct = 0; oct < 7; oct++) {
            for(var i in bare_notes) {
                MIDI_KEY_NAMES.push(bare_notes[i] + oct);
            }
        }
        MIDI_KEY_NAMES.push("c7");

        if (navigator.requestMIDIAccess) {
            navigator.requestMIDIAccess().then(
                function(midi) {
                    console.log(midi);
                    function midimessagehandler(evt) {
                        if(!evt.target.enabled) return;
                        //console.log(evt);
                        var channel = evt.data[0] & 0xf;
                        var cmd = evt.data[0] >> 4;
                        var note_number = evt.data[1];
                        var vel = evt.data[2];
                        //console.log(channel, cmd, note_number, vel);
                        if(cmd == 8 || (cmd == 9 && vel == 0)) {
                            // NOTE_OFF
                            release(MIDI_KEY_NAMES[note_number - 9 + MIDI_TRANSPOSE]);
                        } else if(cmd == 9) {
                            // NOTE_ON
                            press(MIDI_KEY_NAMES[note_number - 9 + MIDI_TRANSPOSE], vel / 100);
                        } else if(cmd == 11) {
                            // CONTROL_CHANGE
                            if(!gAutoSustain) {
                                if(note_number == 64) {
                                    if(vel > 0) {
                                        pressSustain();
                                    } else {
                                        releaseSustain();
                                    }
                                }
                            }
                        }
                    }

                    function plug() {
                        if(midi.inputs.size > 0) {
                            var inputs = midi.inputs.values();
                            for(var input_it = inputs.next(); input_it && !input_it.done; input_it = inputs.next()) {
                                var input = input_it.value;
                                //input.removeEventListener("midimessage", midimessagehandler);
                                //input.addEventListener("midimessage", midimessagehandler);
                                input.onmidimessage = midimessagehandler;
                                if(input.enabled !== false) {
                                    input.enabled = true;
                                }
                                console.log("input", input);
                            }
                        }
                        if(midi.outputs.size > 0) {
                            var outputs = midi.outputs.values();
                            for(var output_it = outputs.next(); output_it && !output_it.done; output_it = outputs.next()) {
                                var output = output_it.value;
                                //output.enabled = false; // edit: don't touch
                                console.log("output", output);
                            }
                            gMidiOutTest = function(note_name, vel, delay_ms) {
                                var note_number = MIDI_KEY_NAMES.indexOf(note_name);
                                if(note_number == -1) return;
                                note_number = note_number + 9 - MIDI_TRANSPOSE;

                                var outputs = midi.outputs.values();
                                for(var output_it = outputs.next(); output_it && !output_it.done; output_it = outputs.next()) {
                                    var output = output_it.value;
                                    if(output.enabled) {
                                        output.send([0x90, note_number, vel], window.performance.now() + delay_ms);
                                    }
                                }
                            }
                        }
                    }

                    midi.addEventListener("statechange", function(evt) {
                        if(evt instanceof MIDIConnectionEvent) {
                            plug();
                        }
                    });

                    plug();

                },
                function(err){
                    console.log(err);
                } );
        }
    })();

    // bug supply

    window.onerror = function(message, url, line) {
        var url = url || "(no url)";
        var line = line || "(no line)";
        // errors in socket.io
        if(url.indexOf("socket.io.js") !== -1) {
            if(message.indexOf("INVALID_STATE_ERR") !== -1) return;
            if(message.indexOf("InvalidStateError") !== -1) return;
            if(message.indexOf("DOM Exception 11") !== -1) return;
            if(message.indexOf("Property 'open' of object #<c> is not a function") !== -1) return;
            if(message.indexOf("Cannot call method 'close' of undefined") !== -1) return;
            if(message.indexOf("Cannot call method 'close' of null") !== -1) return;
            if(message.indexOf("Cannot call method 'onClose' of null") !== -1) return;
            if(message.indexOf("Cannot call method 'payload' of null") !== -1) return;
            if(message.indexOf("Unable to get value of the property 'close'") !== -1) return;
            if(message.indexOf("NS_ERROR_NOT_CONNECTED") !== -1) return;
            if(message.indexOf("Unable to get property 'close' of undefined or null reference") !== -1) return;
            if(message.indexOf("Unable to get value of the property 'close': object is null or undefined") !== -1) return;
            if(message.indexOf("this.transport is null") !== -1) return;
        }
        // errors in soundmanager2
        if(url.indexOf("soundmanager2.js") !== -1) {
            // operation disabled in safe mode?
            if(message.indexOf("Could not complete the operation due to error c00d36ef") !== -1) return;
            if(message.indexOf("_s.o._setVolume is not a function") !== -1) return;
        }
        // errors in midibridge
        if(url.indexOf("midibridge") !== -1) {
            if(message.indexOf("Error calling method on NPObject") !== -1) return;
        }
        // too many failing extensions injected in my html
        if(url.indexOf(".js") !== url.length - 3) return;
        // extensions inject cross-domain embeds too
        if(url.toLowerCase().indexOf("multiplayer.com") == -1) return;

        // errors in my code
        if(url.indexOf("script.js") !== -1) {
            if(message.indexOf("Object [object Object] has no method 'on'") !== -1) return;
            if(message.indexOf("Object [object Object] has no method 'off'") !== -1) return;
            if(message.indexOf("Property '$' of object [object Object] is not a function") !== -1) return;
        }

        var enc = "/bugreport/"
            + (message ? encodeURIComponent(message) : "") + "/"
            + (url ? encodeURIComponent(url) : "") + "/"
            + (line ? encodeURIComponent(line) : "");
        var img = new Image();
        img.src = enc;
    };
    // more button
    (function() {
        var loaded = false;
        setTimeout(function() {
            $("#social").fadeIn(250);
            $("#more-button").click(function() {
                openModal("#more");
                if(loaded === false) {
                    $.get("/more.html").success(function(data) {
                        loaded = true;
                        var items = $(data).find(".item");
                        if(items.length > 0) {
                            $("#more .items").append(items);
                        }
                        try {
                            var ele = document.getElementById("email");
                            var email = ele.getAttribute("obscured").replace(/[a-zA-Z]/g,function(c){return String.fromCharCode((c<="Z"?90:122)>=(c=c.charCodeAt(0)+13)?c:c-26);});
                            ele.href = "mailto:" + email;
                            ele.textContent = email;
                        } catch(e) { }
                    });
                }
            });
        }, 5000);
    })();
});
