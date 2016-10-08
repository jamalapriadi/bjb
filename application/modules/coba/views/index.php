<!DOCTYPE html>
<html lang="en" ng-app="tesApp">
<head>
	<meta charset="UTF-8">
	<title>Latihan</title>
	<!-- bootstrap 3.0.2 -->
    <link href="<?php echo base_url('assets/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- font Awesome -->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css');?> " rel="stylesheet" type="text/css" />
</head>
<body ng-controller="mainCtrl">
	<div class="container">
		<div class="form-group">
	        <label class="checkbox-inline">
	            <input type="checkbox" name="favoriteColors" ng-model="formData.favoriteColors.red" value="red" ng-value="red" ng-true-value="'Pria'" ng-false-value="'0'"> Red
	        </label>
	        <label class="checkbox-inline">
	            <input type="checkbox" name="favoriteColors" ng-model="formData.favoriteColors.blue"> Blue
	        </label>
	        <label class="checkbox-inline">
	            <input type="checkbox" name="favoriteColors" ng-model="formData.favoriteColors.green"> Green
	        </label>
	    </div>

	    <div class="form-group">
                            <label for="">Gender</label>
                            <input type="checkbox" name="Pria" ng-value="Pria" ng-model="Pria"  ng-true-value="'Pria'" ng-false-value="'0'"> Pria

                            <br>

                            <input type="checkbox" name="wanita" ng-model="wanita" ng-true-value="'Wanita'" ng-false-value="'No'"> Wanita
                        </div>
		
		<button class="btn btn-primary" ng-click="lihat()">Lihat</button>
	</div>

	<!-- angular -->
    <script src="<?php echo base_url('assets/angular/angular.js');?>"></script>
    <script src="<?php echo base_url('assets/angular/angular-resource.js');?>"></script>

    <script>
    	var tesApp=angular.module('tesApp',[]);

    	tesApp.controller('mainCtrl',function($scope){
    		$scope.formData={};

		    $scope.lihat=function(){
		    	console.log($scope.Pria);
		    }
    	})
    </script>
</body>
</html>