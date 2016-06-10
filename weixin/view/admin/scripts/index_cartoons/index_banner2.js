//首页banner轮换动画 type:上下变化
function index_banner(eq_id)
{
	//隐藏所有的li
	$('#index_banner li').slideUp();
	// 切换对应标记的样式
	$('#index_banner_round li').removeClass('index_banner_round_hover');
	//给对应的标记加上样式
	$('#index_banner_round li').eq(eq_id).addClass('index_banner_round_hover');
	
	$('#index_banner li').eq(eq_id).slideDown(3000,function(){
		if(eq_id  >= $('#index_banner li').size() - 1)
		{
			index_banner(0);
		}
		else
		{
			index_banner(eq_id+1);
		}
		
	});
}
$(function(){
	//调整首页轮换标记的位置
		//计算参照物的坐标
		var index_banner_sets=$('#index_banner').offset();
		//获取标记的宽度
		var index_banner_round_w=$('#index_banner_round li').size()*20;
		//改变标记的css样式
		$('#index_banner_round').css({'top':index_banner_sets.top+190,'left':index_banner_sets.left+(1000-index_banner_round_w)/2,'display':'block'});
	//开始动画
	index_banner(0);
	
	//对应标记的点击事件
	$('#index_banner_round li').click(function(){
		//获取被点击的index值
		var index=$(this).index();
		//停止动画
		$('#index_banner li').stop();
		//恢复高度
		$('#index_banner li').css({'height':'210px'});
		
		index_banner(index);
	});
});