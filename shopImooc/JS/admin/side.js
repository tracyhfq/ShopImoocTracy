require.config({
    paths:{
        'jquery':'../lib/jquery-1.8.3.min',
//        'base'  :'../common/base',
//        'function':'../common/function',
//        'ymPrompt':'../plug/ymPrompt/ymPrompt',
//        'Pagination':'../plug/simplePagination/jquery.simplePagination',
//        'My97DatePicker': '../plug/My97DatePicker/WdatePicker'

    },
    shim:{
//        'base':{deps: ['jquery']},
//        'function':{deps: ['jquery']},
//        'Pagination':{deps: ['jquery']},
//        'ymPrompt':{deps: ['jquery']}

    },
    waitSeconds:0
});
require(['jquery'],function(jquery){
//	$('dl').css('display','none');
	$('ul').delegate('.menu','click',function(){
		var _id = $(this).prop('id');
		var spanstate = $('span.'+_id).html();
		if(spanstate == "+") {
			$('span.'+_id).html('-');
			$('dl.'+_id).css('display','block');
		}
		else {
			$('span.'+_id).html('+');
			$('dl.'+_id).css('display', 'none');
		}
	});

	function setMenuState(menutype = ""){
		$('span.'+menutype).html('-');
		$('dl.'+menutype).css('display','block');
	}
});