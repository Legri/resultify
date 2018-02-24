
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
    
    $scope.sortName = function(fieldName){
  	$scope.sortType = fieldName;
  	$scope.sortReverse = !$scope.sortReverse;
   
     }
	
	
   $http.get("../../components/list.php")
   .then(function (response) {$scope.names = response.data.records;});
})
.directive('theNameOfYourDirective', function() {
return {
    // Restrict it to be an attribute in this case
    restrict: 'A',
    // responsible for registering DOM listeners as well as updating the DOM
    link: function() {
        $('.materialboxed').materialbox();
    }
   };
 })
.filter('startFrom',function(){
	return function(data, start ){
		 if (!data || !data.length) { return; }
	return data.slice(start);
}
})
;

</script>
	
	
	
	
	
<?php
include_once("views/template/header.php");
?>


<div data-ng-app="myApp">


	

</div>


<div data-ng-app="myApp"> 
 <div ng-controller="NewCtrl" class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
            
			 
<div ng-app="myApp" ng-controller="customersCtrl">

<table class="bordered responsive-table booktable" >
				<tr>
            		<th>Id</th>
            	   
        			<th><a href="" ng-click=sortName('name') >Name</a></th>
        			<th><a href="" ng-click=sortName('autor') >Autor</a></th>
        			<th>foto</th>
        			<th>edit</th>
        			
     			</tr>
     			
  <tr ng-repeat="x in names |orderBy:sortType:sortReverse| startFrom:(currentPage - 1) * pageSize | limitTo:pageSize | filter:searchText:strict" theNameOfYourDirective>
    <td>{{ x.id }}</td>
    <td>{{ x.name  }}</td>
     <td>{{ x.autor }}</td>
     <td > <img class="materialboxed" width="30" src="../../uploads/{{ x.foto }}"  ></td>
      
      <td><?php if ($_SESSION['user']){ ?><a href='/books/view/{{ x.id }}'><br><span class='span6 pull-right'>Edit</a>
      <?php } ?>
      </td>
  </tr>
</table>
 
	<pagination total-items="names.length"  ng-model="currentPage" items-per-page="pageSize" ></pagination>
 
  <label>Search by name <input ng-model="searchText.name"></label>
   <label>Search by autor <input ng-model="searchText.autor"></label>
</div>
 

			 
	   			<div>
	  				<?php include_once("views/books/addform.php");?> 
	   			</div>	
            </div>
        </div>

       
  	 </div>
   </div>
  </div>  
   
   



<?php
include_once("views/template/footer.php");
?>

