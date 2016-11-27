var myapp = angular.module("myApp",["ngRoute","ngFileUpload","ngCookies","ngStorage","ngDialog"]);

 myapp.config(['$routeProvider',function($routeProvider){	
  $routeProvider.
	when('/',{
		templateUrl: 'templates/login.html',
		controller: 'loginCntrl'
	}).
  when('/list',{
    templateUrl: 'templates/list.html',
    controller : 'listCntrl'
  }).
  when('/padhSuchi',{
    templateUrl: 'templates/form1.html'

  }).
  when('/logout',{
    templateUrl:'templates/login.html',
    controller :'logoutCntrl'
  }).
  when('/editpass',{
    templateUrl:'templates/editpass.html',
    controller:'editpassCntrl'
      }).
  when('/register',{
    templateUrl:'templates/register.html',
    controller:'registerCntrl'
  }).
	when('/form1',{
		templateUrl: 'templates/form1.html',
		controller: 'anusuchiCntrl'
	}).
	when('/form2',{
		templateUrl: 'templates/form2.html',
		controller: 'form2Cntrl'		
	}).
  when('/form2/:id',{
    templateUrl: 'templates/form2.html',
    controller : 'form2Update'
  }).
  when('/viewpadh',{
    templateUrl: 'templates/viewpadh.html',
    controller:  'viewAllpadh'
  }).
  when('/viewpaddetail',{
    templateUrl: 'templates/viewpaddetail.html',
    controller:'viewpadRecord'
  }).
	when('/form3',{
		templateUrl: 'templates/form3.html',
		controller: 'personalCntrl'		
	}).
  when('/form3/:id',{
    templateUrl: 'templates/form3.html',
    controller: 'updatePerson'    
  }).
	when('/form4',{
		templateUrl: 'templates/form4.html',
		controller: 'form4Cntrl'
	}).
  when('/viewpdetail',{
    templateUrl: 'templates/viewpdetail.html',
    controller: 'viewPerson'
  }).
  when('/view',{
    templateUrl: 'templates/view.html',
    controller:'viewrecord'
  }).
  when('/form5',{
    templateUrl: 'templates/form5.html',
    controller: 'form5Cntrl'
  }).
  when('/imageUpload',{
    templateUrl:'templates/imageUpload.html',
    controller: 'imageUpload1'
  }).
  when('/form6',{
    templateUrl: 'templates/form6.html',
    controller: 'form6Cntrl'
  }).
  when('/form7',{
    templateUrl: 'templates/form7.html',
    controller: 'form7Cntrl'
  }).
  when('/imageUpload',{
    templateUrl:'templates/imageUpload.html',
    controller:'imageUpCntrl'
  });

}]);
myapp.controller('listCntrl',function($scope,$rootScope,$localStorage,userPersistenceService,$location){
  var getsession = userPersistenceService.getCookieData();
  console.log(getsession);
   if ( typeof(getsession) == 'undefined'){

            $location.path('/');
            return;
          }
     
  $localStorage.pid = '';
  $localStorage.id = '' ;
  $localStorage.upClick = '';
});
myapp.controller('loginCntrl',function($scope,$http,userPersistenceService,$location,$rootScope){
 var getsession = userPersistenceService.getCookieData();
  console.log(getsession);
   if ( getsession == 'super_user'){
            $location.path('/list');
            return;
           } 
      else{
        if($rootScope.successMsg == true){
          console.log($rootScope.successMsg);
          $scope.showSuccessAlert = true;
    // switch flag
    $scope.switchBool = function (value) {
        $scope[value] = !$scope[value];
    };
    $rootScope.successMsg = false;
      }
    }
  $scope.login={};
  $scope.loginBtn = function(){
    console.log($scope.login)
    var request = $http({
    method: "post",
    url: "js/login.php",
    data: $scope.login,
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});
request.success(function (data) {
    var setsession = userPersistenceService.setCookieData(data);
    var getsessiom = userPersistenceService.getCookieData() ;
    if(getsessiom == 'super_user'){
           $location.path('/list');
         }
    else
    {
      $location.path('/');
    }
});
  };
  $scope.padkhoji = function(){
    $rootScope.padkhoji = $scope.padname;
    $location.path('/viewpadh');
    
  };
  $scope.karkhoji = function(){
    $rootScope.karkhoji = $scope.karname;
    console.log($scope.karname);
    $location.path('/viewpdetail');
  };
});
myapp.controller('registerCntrl',function($scope,$rootScope,$location,$http){
  $scope.user={};
  $scope.register = function(){
    var request = $http({
    method: "post",
    url: "js/register.php",
    data: $scope.user,
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});

/* Check whether the HTTP Request is successful or not. */
request.success(function (data) {
    console.log(data);
    $rootScope.successMsg = true;
    $location.path('/');
});
  };
});
myapp.controller('logoutCntrl',function($scope,$http,userPersistenceService,$localStorage){
  $localStorage.id ='';
  $localStorage.upClick= '';
  var sessionClear = userPersistenceService.clearCookieData();
  var getsessiom = userPersistenceService.getCookieData() ;
            console.log(getsessiom);
});
 myapp.controller('anusuchiCntrl',function($scope,$rootScope,userPersistenceService,$http,$location){
   var getsession = userPersistenceService.getCookieData();
  console.log(getsession);
   if ( typeof(getsession) == 'undefined'){
            $location.path('/');
           } 

 	$scope.f1 ={};
  $http.get("js/getofficeD.php")
                .success(function(data){
                  console.log(data);
                  $scope.f1 = data[0];                     
                })
                .error(function() {
                    $scope.p = "error in fetching data";
                });
  $scope.anusuchiSave = function(){
 		console.log("clicked");
 		console.log($scope.f1);
 		
var request = $http({
    method: "post",
    url: "js/updateOfficeDetail.php",
    data: $scope.f1,
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});

/* Check whether the HTTP Request is successful or not. */
request.success(function (data) {
   // $rootScope.karmachari = data;
    $location.path('/form2');
  //  console.log($rootScope.karmachari );
});
 	}
 });
 myapp.controller('form2Cntrl',function($scope,$http,$rootScope,userPersistenceService,$location,ngDialog){
  $scope.padinfo = true;
  $scope.f2={};
  console.log("enter");
  var getsession = userPersistenceService.getCookieData();
  console.log(getsession);
   if ( typeof(getsession) == 'undefined'){
            $location.path('/');
            return;
           } 
           else{
 	
    $scope.submitForm2 = function(){
      
      if(JSON.stringify($scope.f2) === '{}'  && $scope.terij.length > 0) {
   alert("तपाईको डाटा सुरक्षित भयो")
    $location.path('/viewpadh');
}
else if (JSON.stringify($scope.f2) === '{}'  && $scope.terij.length < 1){
  alert("तपाइले डाटा इन्ट्री गर्नुभएन !!");
}
else{
    $scope.f2.kar_id = $rootScope.karmachari;
    console.log($scope.f2.pos_type);
 		var request = $http({
    method: "post",
    url: "js/getdataform2.php",
    data: $scope.f2,
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});
/* Check whether the HTTP Request is successful or not. */
request.success(function (data) {
    console.log(data); 
    alert("तपाईको डाटा सुरक्षित भयो")
    $location.path('/viewpadh');
});}
 	};
  $scope.terij = [];
  $scope.addandSubmit = function(){     
    var request = $http({
    method: "post",
    url: "js/getdataform2.php",
    data: $scope.f2,
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});
/* Check whether the HTTP Request is successful or not. */
request.success(function (data) {
    console.log(data);
    $scope.terij.push($scope.f2);
    var cnt = $scope.f2.S_no;
    $scope.f2={};
    //cnt++;
    //$scope.f2.S_no = cnt;
    $scope.successTextAlert = "Some content";
    $scope.showSuccessAlert = true;

    // switch flag
    $scope.switchBool = function (value) {
        $scope[value] = !$scope[value];
    };
});
  };
 }
 });
myapp.controller('form2Update' , function($scope,userPersistenceService,$rootScope,$localStorage,$http,$location){
   var getsession = userPersistenceService.getCookieData();
  console.log(getsession);
   if ( typeof(getsession) == 'undefined'){
            $location.path('/');
            return;
           } 
  
  if($localStorage.pid != ''){
   $scope.padinfo = false;
    var request = $http({
      method:"post",
      url:"js/getUpdatePad.php",
      data:{id:$localStorage.pid},
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    });
    request.success(function(data){
      console.log(data[0]);
      $scope.f2 = data[0];      
    });
    
  }
  $scope.updatepadinfo = function(){
    var request = $http({
      method:"post",
      url:"js/updatePad.php",
      data:$scope.f2,
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    });
    request.success(function(data){
      console.log(data);
      alert("तपाईको डाटा अपडेट भयो!!!");
      $location.path('/viewpadh');
      $localStorage.pid = '' ;
    });
  };

});
 myapp.controller('viewAllpadh',function($scope,$localStorage,$window,$route,$location,$http,$rootScope,userPersistenceService){
  $scope.authen = true;
  $scope.f1 = {};
   var getsession = userPersistenceService.getCookieData();
  console.log(getsession);
   if ( typeof(getsession) == 'undefined'){
         /*   $location.path('/'); */
           } 
    else {
 $scope.authen = false;
};
$http.get("js/getallpadh.php")
                .success(function(data){
                  console.log(JSON.stringify(data));
                  $scope.f1 = data;
                })
                .error(function() {
                    $scope.p = "error in fetching data";
                });
      if($rootScope.padkhoji != ''){
        $scope.search = $rootScope.padkhoji;
      }
    $scope.searchPadh = function(){
      
    }
    $scope.viewpad = function(f){
      console.log(f);
      $rootScope.pad = f; 
      $location.path('/viewpaddetail');
     // $window.open('#/viewpaddetail');
    };
    $scope.deletePad = function(f){
      var strconfirm = confirm("तपाई साच्चै रेकोर्ड मेटाउन चाहनुहुन्छ?");
if (strconfirm == true)
{
        var request = $http({
    method: "post",
    url: "js/deletePad.php",    
    data: {id:f.id},    
    headers: { 'Content-Type': undefined}
});   
request.success(function (data) {
  console.log(data);
  $route.reload();
  $location.path('/viewpadh');
});
}
    };
    $scope.updatePad = function(f){
      $rootScope.Padupdate = f;
      $localStorage.pid = f.id;
      $location.path('/form2/' + f.id);
    };
 });
 myapp.controller('viewpadRecord',function($scope,$rootScope,$http){
  console.log($rootScope.pad);
  $scope.f2 = $rootScope.pad;
  $http.get("js/getofficeD.php")
                .success(function(data){
                  console.log(data);
                  $scope.f1 = data[0];
                  $scope.f1.start_date = $scope.f2.start_date;
                  $scope.f1.last_date = $scope.f2.last_date;   
                })
                .error(function() {
                    $scope.p = "error in fetching data";
                });
 });
myapp.controller('personalCntrl',function($scope,$rootScope,userPersistenceService,$http,Upload,$location){
    var getsession = userPersistenceService.getCookieData();
  console.log(getsession);
   if ( typeof(getsession) == 'undefined'){
            $location.path('/');
           } 

  $scope.showP = true;
  $scope.ifUpdate = true;
  $scope.p={};
  $scope.s={};  
  $http.get('js/getPadData.php')
            .success(function(data){
              console.log(data);
              $scope.padh = data;
            })
            .error(function(){
              console.log("error fetching data");
            });
  $scope.showPform = function(){
    if($scope.s.choice != undefined){
    $scope.showP = false;
  }
    console.log($scope.s.choice);
    $scope.p.padh = $scope.s.choice;
  };
$scope.onFileSelect = function(file) {
  console.log(file);
      if (!file) return;
    Upload.upload({
        url: 'js/upload.php',
        file: file,
        transformRequest:angular.identity,
    headers: { 'Content-Type': undefined }
      }).then(function(resp) {
        // file is uploaded successfully
        console.log(resp.data);
      });    
  };

  
  $scope.imageUpload;
   $scope.show = true;
  
 	$scope.pinfoSave = function(){
   // console.log($scope.imageUpload);
 		console.log($scope.p);   
 		var request = $http({
    method: "post",
    url: "js/getdataperson.php",
    data: $scope.p,
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});

/* Check whether the HTTP Request is successful or not. */
request.success(function (data) {
console.log(data) ;
 $rootScope.per_id = data;
$location.path('/form4');
});
 	};
 });
myapp.controller('imageUpload1',function($scope,$rootScope,userPersistenceService,$http,$location,Upload){
    var getsession = userPersistenceService.getCookieData();
  console.log(getsession);
   if ( typeof(getsession) == 'undefined'){
            $location.path('/');
            return;
           } 
           $scope.img = {};
           getimage($rootScope.per_id);
var getimage = function(id){
  var req = $http({
    method:'post',
    url:'js/getimageDocument.php',
    data:{id:id},
    headers:{'content-Type':'application/x-www-form-urlencoded'}
  });
  req.success(function(d){
    $scope.img=d;
  });
};
  
   $scope.removeDocs= function(id){
    console.log();
    var req = $http({
      method:'post',
      url:'js/deleteImage.php',
      data:{id:id},
      headers:{'content-Type':'application/x-www-form-urlencoded'}
    });
    req.success(function(dd){
      console.log(dd);
      getimage(id);
    });
   };
  
  $scope.onFileSelect = function(file) {
   // $scope.images.push(file);
   if (!file) return;
   var request = $http({
    method: "post",
    url: "js/saveimageId.php",
    data: {id:$rootScope.per_id},
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});
   request.success(function(data){
     getimage($rootScope.per_id);

   });
        
    Upload.upload({
        url: 'js/uploaddocument.php',
        file: file  ,               
        transformRequest:angular.identity,
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
      }).then(function(resp) {
        // file is uploaded successfully       
        //$location.path('/form6') 
      });    
  };

});
myapp.controller('viewPerson',function($scope,Excel,$timeout,$window,$rootScope,$route,$http,$location,userPersistenceService,$localStorage){
  $scope.ifUpdate = true
  $localStorage.id = '';
  $localStorage.upClick = '';
  var getsession = userPersistenceService.getCookieData();
  console.log(getsession);
   if ( typeof(getsession) == 'undefined'){
            $scope.authen = true;
           // $location.path('/');
           } 
           else{
            $scope.authen = false;
          }
  $scope.exportToExcel=function(tableId){ // ex: '#my-table'
         // $scope.authen = true;
            $scope.exportHref=Excel.tableToExcel(tableId,'कर्मचारी सूची');
            $timeout(function(){location.href=$scope.exportHref;},100); // trigger download
        }
  $rootScope.emp = {};
	$http.get("js/getpersondata.php")
                .success(function(data){
                	console.log(data);
                  $scope.p = data;
                    $rootScope.emp = data;
                })
                .error(function() {
                    $scope.p = "error in fetching data";
                });
      if($rootScope.karkhoji != ''){
        $scope.search = $rootScope.karkhoji;
      }
     $scope.updateinfo  = function(hash,c){
     	console.log(c.id);
      $localStorage.upClick = "update";
      $localStorage.id = c.id;
     	console.log(hash);
      hash = hash + '/' + c.id;
     	$location.path(hash);
     };
  
   $scope.viewdata = function (c){
    $rootScope.viewData = c ; 
    console.log(c.id);
    var request = $http({
    method: "post",
    url: "js/getimage.php",    
    data: {id:c.id},
    
    headers: { 'Content-Type': undefined}
});   
request.success(function (data) {   
   $rootScope.viewData.img_pic = data;     
   $location.path('/view');
   //$window.open('#/view');
});
   };
   $scope.deleteP = function(c){
    var strconfirm = confirm("तपाई साच्चै रेकोर्ड मेटाउन चाहनुहुन्छ?");
if (strconfirm == true)
{
    var request = $http({
    method: "post",
    url: "js/deletePerson.php",    
    data: {id:c.id},    
    headers: { 'Content-Type': undefined}
});   
request.success(function (data) {
  console.log(data);
  $route.reload();
  $location.path('/viewpdetail');
});
}
};
});
myapp.controller('viewrecord',function($scope,$rootScope,$location,$http){
$scope.p = $rootScope.viewData;
var request = $http({
    method: "post",
    url: "js/getpersonSewa.php",
    data: {id:$scope.p.id},
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   
$scope.psewa = [];
request.success(function (data) {
   console.log(data);
   console.log(data.length);
   data.forEach(function(d){
    console.log("data");
    $scope.psewa.push(d);
    console.log(d);
   });

});
$scope.certiList =[];
var request1 = $http({
    method: "post",
    url: "js/getpersonCerti.php",
    data: {id:$scope.p.id},
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   
request1.success(function (data) {
   data.forEach(function(d){
    console.log("data");
    $scope.certiList.push(d);
    console.log(d);
   });
});
var request2 = $http({
    method: "post",
    url: "js/getpersonSajaya.php",
    data: {id:$scope.p.id},
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   
$scope.sajaya = [];
request2.success(function (data) {
   data.forEach(function(d){
    console.log("data");
    $scope.sajaya.push(d);
    console.log(d);
   });
});
$scope.bida=[];
var request3 = $http({
    method: "post",
    url: "js/getpersonBida.php",
    data: {id:$scope.p.id},
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   
request3.success(function (data) {
   data.forEach(function(d){
    console.log("data");
    $scope.bida.push(d);
    console.log(d);
   });
});

var request4 = $http({
    method: "post",
    url: "js/getimageDocument.php",
    data: {id:$scope.p.id},
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   
request4.success(function (data) {
  $scope.img = {};
$scope.i={};
var j = 0;
console.log("a");
  data.forEach(function(i){
    $scope.i[j] = j;
   $scope.img[j]  = i;
   console.log(data.length);
    j++;
   });
    
});
});
myapp.controller('updatePerson',function($scope,$routeParams,userPersistenceService,$rootScope,$http,$localStorage){
    var getsession = userPersistenceService.getCookieData();
  console.log(getsession);
   if ( typeof(getsession) == 'undefined'){
            $location.path('/');
           } 

  console.log($routeParams.id);
  console.log($rootScope.emp);
console.log($scope.p);
var s = {};
console.log(typeof($routeParams.id));
 if($localStorage.upClick == 'update'){
   $scope.ifUpdate = false;
  $scope.showP = false;
  $scope.show = false;
    $rootScope.per_id = $localStorage.id;
    var request = $http({
    method: "post",
    url: "js/getpersonDetail.php",
    data: {id:$localStorage.id},
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   
request.success(function (data) {
   console.log(data);
   s = data[0];
   $scope.p = s;
   console.log(s);
   console.log(data[0]);
});
  };
  /*
if (typeof($routeParams.id) != "undefined"){
  var id = $routeParams.id;
  id = parseInt(id) - 1;
  console.log("defined" + id);
$scope.p = {};
$scope.p = $rootScope.emp[id];
console.log($scope.p);
$scope.show = false;
}
 else{
  
 } */
 $scope.pinfoUpdate= function(){
  console.log("clicked");
  console.log($localStorage.id);
  console.log($localStorage.upClick);
    console.log($scope.p.id);
   // $scope.p.id = parseInt($scope.p.id);
    var request = $http({
    method: "post",
    url: "js/updateperson.php",
    data: $scope.p,
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   
request.success(function (data) {
   alert("तपाईको डाटा अपडेट भयो!!!");
});
 };
});
myapp.controller('form4Cntrl',function($scope,$rootScope,userPersistenceService,$http,$location,$localStorage){
  var getsession = userPersistenceService.getCookieData();
  console.log(getsession);
   if ( typeof(getsession) == 'undefined'){
            $location.path('/');
           } 
$scope.employee_name='';
$scope.ifUpdate = true;
  $scope.sewa = {};
  $scope.upSewa = true;
  $scope.psewa = [];
  
  if($localStorage.upClick == 'update'){
    $scope.ifUpdate = false;
    $rootScope.per_id = $localStorage.id;
    var request = $http({
    method: "post",
    url: "js/getpersonSewa.php",
    data: {id:$localStorage.id},
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   
request.success(function (data) {
   console.log(data);
   console.log(data.length);
   data.forEach(function(d){
    console.log("data");
    $scope.psewa.push(d);
    console.log(d);
   });
   
   console.log($scope.pSewa);
});
  };
var request = $http({
    method: "post",
    url: "js/getpname.php",
    data: {id:$rootScope.per_id},
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   
request.success(function (data) {
  $scope.employee_name = data[0].first_name + " " + data[0].midlle_name + " " + data[0].last_name;
});
  $scope.sewaSave = function(indx){   
  if(JSON.stringify($scope.sewa) === '{}'){
    $location.path('/form5');
    return;
  } 
    $scope.sewa.per_id = $rootScope.per_id;    
    console.log($scope.psewa);
    var request = $http({
    method: "post",
    url: "js/getdataSewa.php",
    data: $scope.sewa,
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   

/* Check whether the HTTP Request is successful or not. */
request.success(function (data) {
  console.log(data);
  if(indx == '2'){
    $location.path('/form5');
  }
  else if(indx == '1'){
    $scope.sewa.id = data;
    $scope.psewa.push($scope.sewa);
    $scope.sewa={};
  }
});
  };
  $scope.editSewa = function(s){
    $scope.upSewa = false;
    var index = $scope.psewa.indexOf(s) ;
    $scope.sewa = $scope.psewa[index];
   console.log($scope.psewa.indexOf(s));
   $scope.psewa.splice(index,1);
};
$scope.updateSewa = function(){
  $scope.upSewa = true;
  $scope.psewa.push($scope.sewa);
   $scope.sewa.per_id = $rootScope.per_id;    
  var request = $http({
    method: "post",
    url: "js/updateSewa.php",
    data: $scope.sewa,
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   

/* Check whether the HTTP Request is successful or not. */
request.success(function (data) {
  console.log(data);
  $scope.sewa={};
});
};
});

myapp.controller('form5Cntrl',function($scope,$http,userPersistenceService,$rootScope,$location,$localStorage){
    var getsession = userPersistenceService.getCookieData();
  console.log(getsession);
   if ( typeof(getsession) == 'undefined'){
            $location.path('/');
           } 
$scope.employee_name = '';
  $scope.ifUpdate = true;
  $scope.c = {};
  $scope.certiList = [];
  $scope.upSewa = true;
  if($localStorage.upClick == 'update'){
    $scope.ifUpdate = false;

    $rootScope.per_id = $localStorage.id;
    var request = $http({
    method: "post",
    url: "js/getpersonCerti.php",
    data: {id:$localStorage.id},
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   
request.success(function (data) {
  console.log(data);
   data.forEach(function(d){
    console.log("data");
    $scope.certiList.push(d);
    console.log(d);
   });
   
});
  };
  var request = $http({
    method: "post",
    url: "js/getpname.php",
    data: {id:$rootScope.per_id},
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   
request.success(function (data) {
  $scope.employee_name = data[0].first_name + " " + data[0].midlle_name + " " + data[0].last_name;
});

  $scope.certSave = function(indx){
    if(JSON.stringify($scope.c) === '{}'){
    $location.path('/imageUpload');
    return;
  } 
   // $scope.certiList.push($scope.c);
    $scope.c.per_id = $rootScope.per_id;
    var request = $http({
    method: "post",
    url: "js/insertCertiInfo.php",
    data: $scope.c,
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});
/* Check whether the HTTP Request is successful or not. */
request.success(function (data) {
  console.log(data);
   if(indx == '2'){
    $location.path('/imageUpload');
  }
  else if(indx == '1'){
    $scope.c.id = data;
    $scope.certiList.push($scope.c);
    $scope.c={};
  }
});
  };
  $scope.editCerti = function(ci){
    $scope.upSewa = false;
    var index  = $scope.certiList.indexOf(ci);
    $scope.c = $scope.certiList[index];
    $scope.certiList.splice(index,1);
  };
  $scope.updateCerti = function(){
    $scope.upSewa = true;
  $scope.certiList.push($scope.c);
   $scope.c.per_id = $rootScope.per_id;    
  var request = $http({
    method: "post",
    url: "js/updateCerti.php",
    data: $scope.c,
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   

/* Check whether the HTTP Request is successful or not. */
request.success(function (data) {
  console.log(data);
  $scope.c={};
});
};
});
myapp.controller('form6Cntrl',function($scope,$rootScope,userPersistenceService,$http,$location,$localStorage){
   var getsession = userPersistenceService.getCookieData();
  console.log(getsession);
   if ( typeof(getsession) == 'undefined'){
            $location.path('/');
           } 
$scope.employee_name = '';
 $scope.ifUpdate = true;
  $scope.punish = {};
  $scope.sajaya = [];
  $scope.upSewa = true;

  if($localStorage.upClick == 'update'){
    $scope.ifUpdate = false;
    $rootScope.per_id = $localStorage.id;
    var request = $http({
    method: "post",
    url: "js/getpersonSajaya.php",
    data: {id:$localStorage.id},
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   
request.success(function (data) {
   data.forEach(function(d){
    console.log("data");
    $scope.sajaya.push(d);
    console.log(d);
   });
});
  };

  var request = $http({
    method: "post",
    url: "js/getpname.php",
    data: {id:$rootScope.per_id},
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   
request.success(function (data) {
  $scope.employee_name = data[0].first_name + " " + data[0].midlle_name + " " + data[0].last_name;
});

  $scope.sajayaSave = function(indx){
    if(JSON.stringify($scope.punish) === '{}'){
    $location.path('/form7');
    return;
  } 
   // $scope.sajaya.push($scope.punish);
    $scope.punish.per_id = $rootScope.per_id;
    var request = $http({
    method: "post",
    url: "js/insertSajaya.php",
    data: $scope.punish,
    headers: { 'Content-Type': 'application/json' }
});
/* Check whether the HTTP Request is successful or not. */
request.success(function (data) {
    if(indx == '2'){
    $location.path('/form7');
  }
  else if(indx == '1'){
    $scope.punish.id = data;
    $scope.sajaya.push($scope.punish);
    $scope.punish={};
  }
});
  };
  $scope.sajayaEdit= function(sy){
    $scope.upSewa = false;
    var index = $scope.sajaya.indexOf(sy);
    $scope.punish = $scope.sajaya[index];
    $scope.sajaya.splice(index,1);
  } ;

  $scope.sajayaUpdate = function(){
    $scope.upSewa = true;
  $scope.sajaya.push($scope.punish);
   $scope.punish.per_id = $rootScope.per_id;    
  var request = $http({
    method: "post",
    url: "js/updateSajaya.php",
    data: $scope.punish,
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   

/* Check whether the HTTP Request is successful or not. */
request.success(function (data) {
  console.log(data);
  $scope.punish={};
});
};
});
myapp.controller('form7Cntrl',function($scope,userPersistenceService,$rootScope,$http,$location,$localStorage){
    var getsession = userPersistenceService.getCookieData();
  console.log(getsession);
   if ( typeof(getsession) == 'undefined'){
            $location.path('/');
           } 
$scope.employee_name = '';
  $scope.ifUpdate = true;
  $scope.bid = {};
  $scope.bida = [];
  $scope.upSewa = true;
  if($localStorage.upClick == 'update'){
    $scope.ifUpdate = false;
    $rootScope.per_id = $localStorage.id;
    var request = $http({
    method: "post",
    url: "js/getpersonBida.php",
    data: {id:$localStorage.id},
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   
request.success(function (data) {
  console.log(data);
   data.forEach(function(d){
    console.log("data");
    $scope.bida.push(d);
    console.log(d);
   });
});
  };

  var request = $http({
    method: "post",
    url: "js/getpname.php",
    data: {id:$rootScope.per_id},
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   
request.success(function (data) {
  $scope.employee_name = data[0].first_name + " " + data[0].midlle_name + " " + data[0].last_name;
});

  $scope.bidaSave = function(indx){
    if(JSON.stringify($scope.bid) === '{}'){
    $location.path('/viewpdetail');
    return;
  } 
  //  $scope.bida.push[$scope.bida];
    $scope.bid.per_id = $rootScope.per_id;
    var request = $http({
    method: "post",
    url: "js/insertBida.php",
    data: $scope.bid,
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});
/* Check whether the HTTP Request is successful or not. */
request.success(function (data) {
   if(indx == '2'){
    alert("तपाइको डाटा सुरक्षित भयो !!!");
    $location.path('/viewpdetail');
  }
  else if(indx == '1'){
    $scope.bid.id = data;
    $scope.bida.push($scope.bid);
    $scope.bid={};
  }
});
  };
  $scope.bidaEdit = function(b){
    $scope.upSewa = false;
    var index = $scope.bida.indexOf(b);
    $scope.bid = $scope.bida[index];
    $scope.bida.splice(index,1);
  };
  $scope.bidaUpdate = function(){
    $scope.upSewa = true;
  $scope.bida.push($scope.bid);
   $scope.bid.per_id = $rootScope.per_id;    
  var request = $http({
    method: "post",
    url: "js/updateBida.php",
    data: $scope.bid,
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   

/* Check whether the HTTP Request is successful or not. */
request.success(function (data) {
  console.log(data);
  $scope.bid={};
});
};
});
myapp.controller('imageUpCntrl',function($scope,$http,$location){

});
myapp.controller('editpassCntrl',function($scope,$http,$rootScope,$location){
  $scope.user={};
  $scope.editpwd = function(){
    var request = $http({
    method: "post",
    url: "js/updatepwd.php",
    data: $scope.user,
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});   

/* Check whether the HTTP Request is successful or not. */
request.success(function (data) {
  if(data == "success"){
     alert('तपाइको पासवोर्ड परिवर्तन भयो !!!');
    $location.path('/');
  }
  else if (data == "failed"){
    alert("युजरनाम वा पासवोर्ड गलत भयो!!!");
  }
});
};
});
myapp.factory("userPersistenceService", [
  "$cookies", function($cookies) {
    var userType = "";

    return {
      setCookieData: function(usertype) {
        userType = usertype;
        console.log(userType);
        $cookies.put("userType", userType);
      },
      getCookieData: function() {
        userType = $cookies.get("userType");
        return userType;
      },
      clearCookieData: function() {
        userType = "";
        $cookies.remove("userType");
      }
    }
  }
]);
myapp.directive( 'goClick', function ( $location ) {
  return function ( scope, element, attrs ) {
    var path;

    attrs.$observe( 'goClick', function (val) {
      path = val;
      
    });

    element.bind( 'click', function () {
      scope.$apply( function () {
        $location.path( path );
      });
    });
  };
});
myapp.factory('Excel',function($window){
        var uri='data:application/vnd.ms-excel;base64,',
            template='<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
            base64=function(s){return $window.btoa(unescape(encodeURIComponent(s)));},
            format=function(s,c){return s.replace(/{(\w+)}/g,function(m,p){return c[p];})};
        return {
            tableToExcel:function(tableId,worksheetName){
                var table=$(tableId),
                    ctx={worksheet:worksheetName,table:table.html()},
                    href=uri+base64(format(template,ctx));
                return href;
            }
        };
    })