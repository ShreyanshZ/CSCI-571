var latitude=null;
var longitude=null;
function getLocation() {
	if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        window.alert("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {
	latitude=position.coords.latitude;
	longitude=position.coords.longitude;
}

angular.module('myApp', ['ngAnimate']).controller('formCtrl', ['$scope', '$http','$window','$timeout' ,function ($scope, $http,$window,$timeout) {
    $scope.myValue=true;
	$scope.typeDetails='';
	$scope.inputValue = null;
	$scope.clearText=function(){
		$scope.inputValue="";
		$scope.showTable=false;
		$scope.myValue=true;
	} 
	
	
	$scope.noResultFound=function(){
		$scope.showTable=false;
	}
	
	
    $scope.abc = function (value) {
		$scope.myValue=true;
		$scope.favVisible=false;
		$scope.loading=true;
		$scope.showTable=false;
		console.log(value);
		console.log($window.latitude);
		console.log($window.longitude);
		//var Userurl="https://graph.facebook.com/v2.8/search?q="+value+"&type=user&fields=id,name,picture.width(700).height(700)&access_token=EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD";	
		var Userurl="fb.php?type=user&query="+value;
		$http.get(Userurl).then(function (response) {
			$scope.loading = false;
			$scope.showDetails=true;
			//console.log(Userurl);
			$scope.users = response.data;
			//console.log(JSON.stringify(response.data));
			$scope.showTable=true;});
		var Userurl="https://graph.facebook.com/v2.8/search?q="+value+"&type=user&fields=id,name,picture.width(700).height(700)&access_token=EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD";	
		$http.get(Userurl).then(function (response) {$scope.userpaging = response.data;});
		
		
				
		var Eventurl="fb.php?type=event&query="+value;
		console.log(Eventurl);
		$http.get(Eventurl).then(function (response) {$scope.events = response.data;});
		var Eventurl="https://graph.facebook.com/v2.8/search?q="+value+"&type=event&fields=id,name,picture.width(700).height(700)&access_token=EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD";
		$http.get(Eventurl).then(function (response) {$scope.eventpaging = response.data;});
		
		
		
		var Pageurl="fb.php?type=page&query="+value;
		console.log(Pageurl);
		$http.get(Pageurl).then(function (response) {$scope.pages = response.data;});
		var Pageurl="https://graph.facebook.com/v2.8/search?q="+value+"&type=page&fields=id,name,picture.width(700).height(700)&access_token=EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD";
		$http.get(Pageurl).then(function (response) {$scope.pagepaging = response.data;});
		
		
		
		
		var Groupurl="fb.php?type=group&query="+value;
		console.log(Groupurl);
		$http.get(Groupurl).then(function (response) {$scope.groups = response.data;});
		var Groupurl="https://graph.facebook.com/v2.8/search?q="+value+"&type=group&fields=id,name,picture.width(700).height(700)&access_token=EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD";
		$http.get(Groupurl).then(function (response) {$scope.grouppaging = response.data;});
		
		if($window.latitude!=null){
			var Placeurl="fb.php?type=place&query="+value+"&lat="+$window.latitude+"&lon="+$window.longitude;
			console.log(Placeurl);
			$http.get(Placeurl).then(function (response) {$scope.places = response.data;});
			//var Placeurl="https://graph.facebook.com/v2.8/search?q="+value+"&type=place&center="+$window.latitude+","+$window.longitude+"&distance=1000&fields=id,name,picture.width(700).height(700)&access_token=EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD";
			var Placepageurl="https://graph.facebook.com/v2.8/search?q="+value+"&type=place&center="+$window.latitude+","+$window.longitude+"&distance=1000&fields=id,name,picture.width(700).height(700)&access_token=EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD";
			$http.get(Placepageurl).then(function (response) {$scope.placepaging = response.data;});
		
		}else{
			//var Placeurl="https://graph.facebook.com/v2.8/search?q="+value+"&type=place&fields=id,name,picture.width(700).height(700)&access_token=EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD";
			var Placeurl="fb.php?type=place&query="+value;
			console.log(Placeurl);
			$http.get(Placeurl).then(function (response) {$scope.places = response.data;});
			var Placepageurl="https://graph.facebook.com/v2.8/search?q="+value+"&type=place&fields=id,name,picture.width(700).height(700)&access_token=EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD";
			$http.get(Placepageurl).then(function (response) {$scope.placepaging = response.data;});
		}
		//$http.get(Placeurl).then(function (response) {$scope.places = response.data;});
		
    };
	
	$scope.nextUsers=function(nextUserURL){
		console.log(nextUserURL);
		//$scope.showTable=false;
		$http.get(nextUserURL).then(function(response){
				$scope.users = response.data.data;
		});
		
		$http.get(nextUserURL).then(function(response){
				$scope.userpaging = response.data;
		});
		
	};
	
	
	$scope.previousUsers=function(previousUserURL){
		console.log(previousUserURL);
		$http.get(previousUserURL).then(function(response){
				$scope.users = response.data;
		});
	};
	
	$scope.nextGroups=function(nextUserURL){
		console.log(nextUserURL);
		$http.get(nextUserURL).then(function(response){
				$scope.groups = response.data.data;
		});
		
		$http.get(nextUserURL).then(function(response){
				$scope.grouppaging = response.data;
		});
	};
	
	
	$scope.previousGroups=function(previousUserURL){
		console.log(previousUserURL);
		$http.get(previousUserURL).then(function(response){
				$scope.groups = response.data;
		});
	};
	
	
	$scope.nextPlaces=function(nextUserURL){
		console.log(nextUserURL);
		$http.get(nextUserURL).then(function(response){
				$scope.places = response.data.data;
		});
		
		$http.get(nextUserURL).then(function(response){
				$scope.placepaging = response.data;
		});
	};
	
	
	$scope.previousPlaces=function(previousUserURL){
		console.log(previousUserURL);
		$http.get(previousUserURL).then(function(response){
				$scope.places = response.data;
		});
	};
	
	
	$scope.nextEvents=function(nextUserURL){
		console.log(nextUserURL);
		$http.get(nextUserURL).then(function(response){
				$scope.events = response.data.data;
		});
		
		$http.get(nextUserURL).then(function(response){
				$scope.eventpaging = response.data;
		});
	};
	
	
	$scope.previousEvents=function(previousUserURL){
		console.log(previousUserURL);
		$http.get(previousUserURL).then(function(response){
				$scope.events = response.data;
		});
	};
	
	$scope.nextPages=function(nextUserURL){
		//console.log(nextUserURL);
		$http.get(nextUserURL).then(function(response){
				$scope.pages = response.data.data;
		});
		
		$http.get(nextUserURL).then(function(response){
				$scope.pagepaging = response.data;
		});
	};
	
	
	$scope.previousPages=function(previousUserURL){
		console.log(previousUserURL);
		$http.get(previousUserURL).then(function(response){
				$scope.pages = response.data;
		});
	};
	
	
	$scope.slideRight=function(idValue,fburl,fbname,localtypeval){
		$scope.typeDetails=localtypeval;
		$window.fbpicture=fburl;
		$window.fbname=fbname;
		$scope.showTable=false;
		
		var detailURL="fb.php?id="+idValue;
		$http.get(detailURL).then(function(response){
				//$scope.details = response.data;
				//console.log(response.data);
				//console.log(JSON.parse(response.data.albums));
		});
		var detailURL="https://graph.facebook.com/v2.8/"+idValue+"?fields=id,name,picture.width(700).height(700),albums.limit(5){name,photos.limit(2){name,picture}},posts.limit(5)&access_token=EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD";
		$http.get(detailURL).then(function(response){
				$scope.details = response.data;
		});
		$scope.loadingDetails=false;
		$timeout(function () { $scope.loadingDetails=true; }, 1000);
		$scope.myValue=false;
		//$scope.loadingDetails=false;
		$timeout(function () { $scope.actualDetails=true; }, 1000);
		$scope.actualDetails=false;
	};
	
	$scope.clickTab=function(){
		if($scope.myValue==false){
			$scope.myValue=true;
			$scope.showTable=true;
			$scope.loadingDetails=true;
		}
	};
	
	$scope.addToLocal=function(idValue,name,picture,typeval){
		//var string = '{"items":[{"Desc":"Item1"},{"Desc":"Item2"}]}';
		localStorage.setItem(idValue,JSON.stringify({"name":name,"type":typeval,"picture":picture}));
		console.log(idValue);
		
	};
	
	$scope.removeFromLocal=function(idValue){
		localStorage.removeItem(idValue);
		//console.log(localStorage.getItem(localStorage.key(idValue)));
		//delete $scope.favourites(idValue);
		//$scope.favourites.splice( $scope.favourites.indexOf(idValue), 1 );
		console.log(idValue+" Removed");
		$scope.favourites={};
		for(var i=0;i<localStorage.length;i++){
			//console.log(JSON.parse(localStorage.getItem(localStorage.key(i))));
			$scope.favourites[localStorage.key(i)]=(JSON.parse(localStorage.getItem(localStorage.key(i))));
			//console.log(i);
		}
		console.log($scope.favourites);
		
	};
	
	$scope.checkStorage=function(idValue){
		var inLocal = localStorage.getItem(idValue);
		return inLocal;
	};
	
	$scope.getFavourites=function(){
		//console.log(localStorage.length);
		$scope.favourites={};
		for(var i=0;i<localStorage.length;i++){
			//console.log(JSON.parse(localStorage.getItem(localStorage.key(i))));
			$scope.favourites[localStorage.key(i)]=(JSON.parse(localStorage.getItem(localStorage.key(i))));
			//console.log(i);
		}
		console.log($scope.favourites);
	};
	
	/*$scope.share=function()={
		FB.ui({
					app_id:164458207397902,
					method: 'feed',
					display: 'popup',
					href: 'https://developers.facebook.com/docs/',
				  }, function(response){
					  if (response && !response.error_message) 
						alert("Posted Successfully");
					else
						alert("Not Posted");
				  });
		
	};*/
}]);




