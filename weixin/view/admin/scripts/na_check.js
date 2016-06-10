/*
字符串检查函数文件包
作者: 陈甫 2012-09-27
说明: 检查到错误 返回 真 true 没有检查到错误 返回 假 false
*/

//检查字符串的长度
function na_check_strlength(check_id,min_length,max_length)
{
	var checkval=$('#'+check_id).val();
	//最小长度检查
	if(checkval.length < min_length)
	{
		return true;
	}
	//判断是否要进行最大长度检查
	if(max_length == undefined)
	{
		return false;
	}
	else
	{
		//检查最大长度
		if(checkval.length > max_length)
		{
			return true;
		}
		else
		{
			return false;	
		}
	}
	
	return false;
}

//字符串等值检查
function na_check_same(check_id1,check_id2)
{
	if($('#'+check_id1).val() == $('#'+check_id2).val())
	{
		return false;
	}
	return true;
}



//整数及整数位数检查
function na_check_integer(check_id,min_length,max_length)
{
	var checkval = $('#'+check_id).val();

	var reg = new RegExp('^[1-9][0-9]{'+(min_length-1)+','+(max_length-1)+'}$');
	if(!reg.test(checkval))
	{
		return true;
	}
	return false;
}
