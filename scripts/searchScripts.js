function highlight(category)
{
	var allCategory =  ["national", "international", "sports", "entertainment", "opinion", "business"];
	for(var i = 0; i < allCategory.length; i++)
	{
		document.getElementById(allCategory[i]).className = '';
	}
	document.getElementById(category).className = 'active';
}