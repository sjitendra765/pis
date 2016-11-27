angular.module("LearningApp",[])
.directive("helloWorld",function(){
	return{
			template: '{{"this is test"}}'
	};
})
.controller('myMethod',function($scope){
	$scope.testButton = function(){
		console.log("this is tesst button");
	}
})
;