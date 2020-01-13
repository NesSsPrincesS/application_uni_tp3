var app = angular.module('app', []);

app.controller('ProgramApplicationsCRUDCtrl', ['$scope', 'ProgramApplicationsCRUDService', function ($scope, ProgramApplicationsCRUDService) {

        $scope.updateApplication = function () {
            ProgramApplicationsCRUDService.updateApplication($scope.programApplication.id, $scope.programApplication.user_id, $scope.application.application_outcome)
                    .then(function success(response) {
                        $scope.message = 'Application data updated!';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error updating application!';
                                $scope.message = '';
                            });
        }

        $scope.getApplication = function () {
            var id = $scope.programApplication.id;
            ProgramApplicationsCRUDService.getApplication($scope.programApplication.id)
                    .then(function success(response) {
                        $scope.programApplication = response.data.data;
                        $scope.programApplication.id = id;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                if (response.status === 404) {
                                    $scope.errorMessage = 'Application not found!';
                                } else {
                                    $scope.errorMessage = "Error getting application!";
                                }
                            });
        }

        $scope.addApplication = function () {
            if ($scope.application != null && $scope.application.name) {
                ProgramApplicationsCRUDService.addApplication($scope.application.name, $scope.application.description)
                        .then(function success(response) {
                            $scope.message = 'Application added!';
                            $scope.errorMessage = '';
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Error adding application!';
                                    $scope.message = '';
                                });
            } else {
                $scope.errorMessage = 'Please enter a name!';
                $scope.message = '';
            }
        }

        $scope.deleteApplication = function () {
            ProgramApplicationsCRUDService.deleteApplication($scope.application.id)
                    .then(function success(response) {
                        $scope.message = 'Application deleted!';
                        $scope.application = null;
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error deleting application!';
                                $scope.message = '';
                            })
        }

        $scope.getAllApplications = function () {
            ProgramApplicationsCRUDService.getAllApplications()
                    .then(function success(response) {
                        $scope.programApplications = response.data.data;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                $scope.errorMessage = 'Error getting applications!';
                            });
        }

    }]);

app.service('ProgramApplicationsCRUDService', ['$http', function ($http) {

        this.getApplication = function getApplication(id) {
            return $http({
                method: 'GET',
                url: urlToRestApi + '/' + id,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }

        this.addApplication = function addApplication(name, description) {
            return $http({
                method: 'POST',
                url: urlToRestApi,
                data: {name: name, description: description},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }

        this.deleteApplication = function deleteApplication(id) {
            return $http({
                method: 'DELETE',
                url: urlToRestApi + '/' + id,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            })
        }

        this.updateApplication = function updateApplication(id, name, description) {
            return $http({
                method: 'PATCH',
                url: urlToRestApi + '/' + id,
                data: {name: name, description: description},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            })
        }

        this.getAllApplications = function getAllApplications() {
            let $thing = $http({
                method: 'GET',
                url: urlToRestApi,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
            console.log($thing);

            return $http({
                method: 'GET',
                url: urlToRestApi,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }

    }]);


