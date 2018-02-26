
	<script src="../../libraries/angular.js"></script>
	<script data-require="ui-bootstrap@*" src="../../libraries/ui-bootstrap-tpls-0.12.0.min.js"> </script>
	<link href="../../libraries/materialize.min.css" rel="stylesheet">
	
	
	
	
<script>
var app = angular.module('myApp', ['ui.bootstrap']);
app.controller('customersCtrl', function($scope, $http) {
	$scope.pageSize=5;
	$scope.currentPage=1;
	
	$scope.sortType     = 'date'; // set the default sort type
    $scope.sortReverse  = true;  // set the default sort order
    $scope.myfunct = function() {
    $scope.currentPage=1;
  }
    $scope.sortName = function(fieldName){
  	$scope.sortType = fieldName;
  	$scope.sortReverse = !$scope.sortReverse;
   
     }
	
	
   $http.get("../../components/list.php")
   .then(function (response) {$scope.names = response.data.records;});
})
.filter('startFrom',function(){
	return function(data, start ){
		 if (!data || !data.length) { return; }
	return data.slice(start);
}
})
;


app.directive("switch", [function() {
  return {
    link: function(scope, element, attr) {
       
                       $('.materialboxed').materialbox();
        
     }
  }
}]);

</script>
	
	
	
	
	
<?php
include_once("views/template/header.php");
?>




<div data-ng-app="myApp"> 
 <div ng-controller="NewCtrl" class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
            
			 
<div ng-app="myApp" ng-controller="customersCtrl">

<table class="bordered responsive-table booktable" >
				<tr>
            		<th><a href="" ng-click=sortName('date') >Id</a></th>
            	   
        			<th><a href="" ng-click=sortName('name') >Name</a></th>
        			<th><a href="" ng-click=sortName('autor') >Autor</a></th>
        			<th>foto</th>
        			<th>edit</th>
        			
     			</tr>
     			
  <tr ng-repeat="x in names |  filter:searchText:strict| orderBy:sortType:sortReverse| startFrom:(currentPage - 1) * pageSize | limitTo:pageSize " >
    <td>{{ x.id }}</td>
    <td>{{ x.name  }}</td>
     <td>{{ x.autor }}</td>
     <td > <img class="materialboxed" width="30" src="../../uploads/{{ x.foto }}"  switch></td>
      
      <td><?php if ($_SESSION['user']){ ?><a href='/books/view/{{ x.id }}'><br><span class='span6 pull-right'>Edit</a>
      <?php } ?>
      </td>
  </tr>
</table>
 
	<pagination total-items="arr=(names |  filter:searchText:strict).length"  ng-model="currentPage" items-per-page="pageSize" ></pagination>
 
  <label>Search by name <input ng-model="searchText.name" ng-change="myfunct()"></label>
   <label>Search by autor <input ng-model="searchText.autor" ng-change="myfunct()></label>
</div>
 

			 
	   			<div>
	  				<?php include_once("views/books/addform.php");?> 
	   			</div>	
            </div>
        </div>

       
  	 </div>
   </div>
  </div>  
   
   


<div style="display: none"></div>
<?php
include_once("views/template/footer.php");

?>


