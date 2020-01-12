var app = angular.module('linkedlists', []);
console.log('hhhh');

app.controller('FacultiesController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.faculties = response.data;
    });
});
