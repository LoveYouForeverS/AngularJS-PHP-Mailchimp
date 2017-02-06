

app.controller("directController",function ($scope ,$http){

		$http.get('./getTemplate.php').then(function (response) {
			console.log(response);

			$scope.campaignLists = response.data.records.user ;
			console.log(response);
		});

		$scope.valid = function(){

			if($scope.inputForm.$valid){

				$http.get('./CreateCampaign.php',{params:{'templateId':$scope.selectCampaign,'title':$scope.title,'contents':$scope.contents}}).then(function (response) {

				if(response.data) {
					$scope.msg = "success !" ;
				} else {
					$scope.msg = "failure !" ;
				}	
				});
			} else {
				alert('No') ;
			}
		}
	//}

});