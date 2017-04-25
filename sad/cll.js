function loadList(){
	$(#courselist).load('courselist.php');
}

function numLetters(letter){
	return new Function("number","var str='';for(var i=1;i<number;i+=1){str+='"+letter+"';} return str;");
}

var string = "Hi, my name is $# name %% And I $# emotion %% this $# thing %%!";
var customDelimiters ={open: '$#', close: '%%'};

function template(text, opotions){
	var delimiter = {
		open: '*(',
		close: ')*'
		};
	var templateString =[];
	var i=1;
	var closingDelimiterLoc =0;
	var funtionArgument =[];
	var theVarible,remaining;

	var wrapInQuotes = 
	return new Function("") ;
}

logResult('Richard', 'love', 'green mint icecreame',2);