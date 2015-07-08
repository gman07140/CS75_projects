<html ng-app="modalTest">
  <head>

    <link href="/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/> 
        <link href="/css/modal.css" rel="stylesheet"/> 

    <script src="/java/angular.min.js"></script>
    <script src="/java/bsangular.js"></script>
    <script src="/java/angulardialog.js"></script>
        <script src="modal.js"></script>
  </head>
  <body ng-controller="dialogServiceTest" class="pad">
    <h2>Bootstrap 3 & AngularJS Dialog/Modals</h2><br />
    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-danger" ng-click="launch('error')">Error Dialog</button>
    
        <button class="btn btn-primary" ng-click="launch('wait')">Wait Dialog</button>
    
        <button class="btn btn-default" ng-click="launch('notify')">Notify Dialog</button>
    
        <button class="btn btn-success" ng-click="launch('confirm')">Confirm Dialog</button>
        
        <button class="btn btn-warning" ng-click="launch('create')">Custom Dialog</button>
      </div>
    </div>
    <br />
    <div class="row">
      <div class="col-md-12">
        <p>
          <span class="text-info">From Confirm Dialog</span>: {{confirmed}}
        </p>
      </div>
    </div>
    <br />
    <div class="row">
      <div class="col-md-12">
        <p>
          <span class="text-info">Your Name</span>: {{name}}
        </p>
      </div>
    </div>
    <br />
    
  </body>
</html>