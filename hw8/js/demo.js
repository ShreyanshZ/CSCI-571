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

angular.module('myApp', []).controller('formCtrl', ['$scope', '$http','$window', function ($scope, $http,$window) {
    $scope.inputValue = null;
    $scope.abc = function (value) {
		console.log(value);
		console.log($window.latitude);
		console.log($window.longitude);
		var Userurl="https://graph.facebook.com/v2.8/search?q="+value+"&type=user&fields=id,name,picture.width(700).height(700)&access_token=EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD";
		$http.get(Userurl).then(function (response) {
			$scope.loading = false;
			$scope.showDetails=true;
			$scope.users = response.data.data;});
		
		var Eventurl="https://graph.facebook.com/v2.8/search?q="+value+"&type=event&fields=id,name,picture.width(700).height(700)&access_token=EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD";
		$http.get(Eventurl).then(function (response) {$scope.events = response.data.data;});
		
		var Pageurl="https://graph.facebook.com/v2.8/search?q="+value+"&type=page&fields=id,name,picture.width(700).height(700)&access_token=EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD";
		$http.get(Pageurl).then(function (response) {$scope.pages = response.data.data;});
		
		var Groupurl="https://graph.facebook.com/v2.8/search?q="+value+"&type=group&fields=id,name,picture.width(700).height(700)&access_token=EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD";
		$http.get(Groupurl).then(function (response) {$scope.groups = response.data.data;});
		
		if($window.latitude!=null)
			var Placeurl="https://graph.facebook.com/v2.8/search?q="+value+"&type=place&center="+$window.latitude+","+$window.longitude+"&distance=1000&fields=id,name,picture.width(700).height(700)&access_token=EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD";
		else
			var Placeurl="https://graph.facebook.com/v2.8/search?q="+value+"&type=place&fields=id,name,picture.width(700).height(700)&access_token=EAACVkukISA4BAI06a1pzHwfM1FpoDUrOxpP3hA0jdv3dWmZA9M95GLSZC6lZARLMKhZCnIXRQlyvsQ710xV9LTHVqXeNcshB9PZA3zPV9qxHBZAPy0U2PX2Bkv60xLL2UadLTkXPZBGtd8ZAwj5gZCAdND7WHA2q0Eo4ZD";
		$http.get(Placeurl).then(function (response) {$scope.places = response.data.data;});
		
    };
}]);