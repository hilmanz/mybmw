(function ($) {
    "use strict";
    $(document).ready(function () {
		Morris.Bar({
			element: 'graph-bar',
			data: [
				{x: 'Asmirandah', y: 3, z: 2, a: 3},
				{x: 'Oliver', y: 2, z: null, a: 1},
				{x: 'Messi', y: 4, z: 2, a: 4},
				{x: 'Ronaldo', y: 12, z: 4, a: 3},
				{x: 'Budi', y: 5, z: 4, a: 3},
				{x: 'Donna', y: 13, z: 4, a: 3},
				{x: 'Elis', y: 6, z: 4, a: 3},
				{x: 'Prasti', y: 8, z: 4, a: 3},
				{x: 'Febri', y: 9, z: 4, a: 3},
				{x: 'Anto', y: 4, z: 4, a: 3}
			],
			xkey: 'x',
			ykeys: ['y'],
			labels: ['Total Order'],
			barColors:['#313978','#D9DD81','#79D1CF']
		
		
		});

			Morris.Line({
			  element: 'dailyorder',
			  data: [
				{ y: '19/12/2014', a: 100, b: 90 },
				{ y: '20/12/2014', a: 75,  b: 65 },
				{ y: '21/12/2014', a: 50,  b: 40 },
				{ y: '22/12/2014', a: 75,  b: 65 },
				{ y: '23/12/2014', a: 50,  b: 40 },
				{ y: '24/12/2014', a: 75,  b: 65 },
				{ y: '25/12/2014', a: 100, b: 90 }
			  ],
			  xkey: 'y',
			  ykeys: ['a'],
			  labels: ['Total Order']
			});
		
		Morris.Bar({
			element: 'toparea',
			data: [
				{x: 'Jakarta', y: 3, z: 2, a: 3},
				{x: 'Bandung', y: 2, z: null, a: 1},
				{x: 'Surabaya', y: 4, z: 2, a: 4},
				{x: 'Medan', y: 12, z: 4, a: 3},
				{x: 'Tangerang', y: 5, z: 4, a: 3},
				{x: 'Bogor', y: 13, z: 4, a: 3},
				{x: 'Elis', y: 6, z: 4, a: 3},
				{x: 'Bekasi', y: 8, z: 4, a: 3},
				{x: 'Makasar', y: 9, z: 4, a: 3},
				{x: 'Papua', y: 4, z: 4, a: 3}
			],
			xkey: 'x',
			ykeys: ['y'],
			labels: ['Total Order'],
		
		
		});
		
		Morris.Bar({
			element: 'topproduct',
			data: [
				{x: 'Samsung', y: 3, z: 2, a: 3},
				{x: 'Nokia', y: 2, z: null, a: 1},
				{x: 'Sepeda', y: 4, z: 2, a: 4},
				{x: 'Tosiba', y: 12, z: 4, a: 3},
				{x: 'Maspion', y: 5, z: 4, a: 3},
				{x: 'Galaxy', y: 13, z: 4, a: 3},
				{x: 'Iphone 6', y: 6, z: 4, a: 3},
				{x: 'Ipad Mini', y: 8, z: 4, a: 3},
			],
			xkey: 'x',
			ykeys: ['y'],
			labels: ['Total Order'],
		
		
		});
		Morris.Bar({
		  element: 'bar-example',
		  data: [
			{ y: 'Jakarta', a: 100, b: 90 },
			{ y: 'Bandung', a: 75,  b: 65 },
			{ y: 'Surabaya', a: 50,  b: 40 },
			{ y: 'Medan', a: 75,  b: 65 },
			{ y: 'Bali', a: 50,  b: 40 },
			{ y: 'Yogyakarta', a: 75,  b: 65 },
			{ y: 'Maluku', a: 100, b: 90 }
		  ],
		  xkey: 'y',
		  ykeys: [ 'a','b'],
		  labels: [ 'Cash', 'Credit']
		});
        $('.progress-stat-bar li').each(function () {
            $(this).find('.progress-stat-percent').animate({
                height: $(this).attr('data-percent')
            }, 1000);
        });








    });


})(jQuery);
