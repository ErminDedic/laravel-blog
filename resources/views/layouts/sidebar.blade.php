<div class="col-md-4">
    <div class="card">
        <div class="card-header bg-white">
            <h4>
                Categories
            </h4>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{url('/')}}" class="btn btn-link text-decoration-none text-dark">
                        All categories 
                        <span class="badge bg-primary rounded-pill">
                            {{\App\Models\Post::count()}}
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>