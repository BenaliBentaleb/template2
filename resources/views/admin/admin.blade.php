
@extends('admin.index') @section('admin')

    
<div class="my-3 my-md-5">
  <div class="container">
    <div class="page-header">
      <h1 class="page-title">
        Bienvenue dans le panneau de contrôle - NTICien !
      </h1>
    </div>
    <div class="row row-cards">
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
          <div class="card-status card-status-left bg-blue"></div>
          <div class="card-body p-5 text-center">
            <div class="h1 m-0">{{$users}}</div>
            <div class="text-muted mb-4">Utilisateurs</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-status card-status-left bg-orange"></div>
          <div class="card-body p-5 text-center">
            <div class="h1 m-0">{{$status}}</div>
            <div class="text-muted mb-4">Status</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-status card-status-left bg-lime"></div>
          <div class="card-body p-5 text-center">
            <div class="h1 m-0">{{$Tutorial}}</div>
            <div class="text-muted mb-4">Tutoriels</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-status card-status-left bg-blue"></div>
          <div class="card-body p-5 text-center">
            <div class="h1 m-0">{{$FAQ}}</div>
            <div class="text-muted mb-4">FAQs</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-status card-status-left bg-indigo"></div>
          <div class="card-body p-5 text-center">
            <div class="h1 m-0">{{$sondage}} </div>
            <div class="text-muted mb-4">Sondages</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-status card-status-left bg-teal"></div>
          <div class="card-body p-5 text-center">
            <div class="h1 m-0">{{$memoire}}</div>
            <div class="text-muted mb-4">Mémoires</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-status card-status-left bg-red"></div>
          <div class="card-body p-5 text-center">
            <div class="h1 m-0">{{$reclamation}}</div>
            <div class="text-muted mb-4">Réclamations</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-status card-status-left bg-azure"></div>
          <div class="card-body p-5 text-center">
            <div class="h1 m-0">{{$evenement}}</div>
            <div class="text-muted mb-4">Événements</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-status card-status-left bg-gray-dark"></div>
          <div class="card-body p-5 text-center">
            <div class="h1 m-0">{{$departement}}</div>
            <div class="text-muted mb-4">Départements</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-lg-2">
        <div class="card">
            <div class="card-status card-status-left bg-pink"></div>
          <div class="card-body p-5 text-center">
            <div class="h1 m-0">{{$formation}}</div>
            <div class="text-muted mb-4">Formations</div>
          </div>
        </div>
      </div>

    </div>


  </div>
</div>
</div>


</div>

@endsection