%% views/header.html %%

<div class="row">
  <div class="col-lg-12">
    <h2>Recent Chirps</h2>
[[ foreach ($chirps as $chirp) : ]]
  %% views/chirp_summary.php %%
[[ endforeach; ]]
  </div>
</div>

[[ if (isLoggedIn()): ]]
<div class="row mt-4">
  <div class="col-lg-12">
  <a href="@@chirp/add@@"><button class="btn btn-primary mr-1 d-flex justify-content-center align-content-between" ><span class="material-icons">add_circle_outline</span>&nbsp;Send a Chirp</button></a>
  </div>
</div>
[[ endif; ]]
          
%% views/footer.html %% 