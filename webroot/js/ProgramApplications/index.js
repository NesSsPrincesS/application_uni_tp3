var app = angular.module('app', []);

app.controller('ProgramApplicationsCRUDCtrl', ['$scope', 'ProgramApplicationsCRUDService', function ($scope, ProgramApplicationsCRUDService) {

    //TODO: remove messages and unused $scope.xxx
    //fired when the page loads
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

    //create a new application like with New Program Application
    $scope.addApplication = function () {
        if ($scope.application != null && $scope.application.university_id && $scope.application.program_id) {
            ProgramApplicationsCRUDService.addApplication($scope.application.id, $scope.application.university_id, $scope.application.program_id)
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

    //get application - from the actions menu 'view'
    $scope.getApplication = function (id) {
        $('.prog-app-index').hide();
        $('.prog-app-view').show();
        ProgramApplicationsCRUDService.getApplication(id)
            .then(function success(response) {
                    $scope.application = response.data.data;
                    $scope.application.id = id;
                    $scope.message = '';
                    $scope.errorMessage = '';
                    console.log($scope.application);
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

    //display the application update form
    $scope.displayUpdateForm = function(application) {
        $('.prog-app-index').hide();
        $('.prog-app-view').hide();
        $('.prog-app-edit').show();
    }

    //update application outcome with application id - from the actions menu 'update'
    $scope.updateApplication = function (application) {
        console.log('wee');

        $('.prog-app-index').show();
        $('.prog-app-view').hide();
        $('.prog-app-edit').hide();
        ProgramApplicationsCRUDService.updateApplication(application.id, application.application_outcome_id, application.application_status_id)
            .then(function success(response) {
                    $scope.message = 'Application data updated!';
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.errorMessage = 'Error updating application!';
                    $scope.message = '';
                });
    }


    //delete application from actions menu - 'delete'
    $scope.deleteApplication = function (id) {
        if (confirm('Are you sure you want to delete this location?')) {
            ProgramApplicationsCRUDService.deleteApplication(id)
                .then(function success(response) {
                        $scope.getAllApplications();
                        /*   $scope.message = 'Application deleted!';
                           $scope.application = null;
                           $scope.errorMessage = '';*/
                    },
                    function error(response) {
                        $scope.errorMessage = 'Error deleting application!';
                        $scope.message = '';
                    })
        }
    }

}]);

app.service('ProgramApplicationsCRUDService', ['$http', function ($http) {

    this.getApplication = function getApplication(id) {
        return $http({
            method: 'GET',
            url: urlToRestApi + '/' + id,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        });
    }

    this.addApplication = function addApplication(university_id, program_id) {
        return $http({
            method: 'POST',
            url: urlToRestApi,
            data: {university_id: university_id, program_id: program_id},
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        });
    }

    this.deleteApplication = function deleteApplication(id) {
        return $http({
            method: 'DELETE',
            url: urlToRestApi + '/' + id,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
    }

    this.updateApplication = function updateApplication(id, application_outcome_id, application_status_id) {
        return $http({
            method: 'PATCH',
            url: urlToRestApi + '/' + id,
            data: {application_outcome_id: application_outcome_id, application_status_id: application_status_id},
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
    }

    this.getAllApplications = function getAllApplications() {
        let $thing = $http({
            method: 'GET',
            url: urlToRestApi,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        });
        // console.log($thing);

        return $http({
            method: 'GET',
            url: urlToRestApi,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        });
    }

}]);


