%% views/header.html %%

<div class="row">
  <div class="col-lg-12">

    <form action="{{$action}}" method="post" enctype="multipart/form-data">
      <label for="username">Requested Username</label>
      <div class="input-group mb-2">
          <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
        <input type="text" min="1" id="usernme" name="form[username]" class="form-control" rows="12" placeholder="username" value="{{value($form['username'])}}" />
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col">
            <label for="firstName">First name</label>
            <input type="text" min="1" id="firstName" name="form[firstName]" class="form-control" placeholder="Enter first name" value="{{value($form['firstName'])}}" />
          </div>
          <div class="col">
            <label for="lastName">Last name</label>
            <input type="text" min="1" id="lastName" name="form[lastName]" class="form-control" placeholder="Enter last name" value="{{value($form['lastName'])}}" />
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col">
            <label for="email">Email address</label>
            <input type="text" min="1" id="email1" name="form[email1]" class="form-control" placeholder="Enter email address" value="{{value($form['email1'])}}" />
          </div>
          <div class="col">
            <label for="email">Verify email address</label>
            <input type="text" min="1" id="email2" name="form[email2]" class="form-control" placeholder="Re-enter email address" value="{{value($form['email2'])}}" />
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col">
            <label for="password">Password</label>
            <input type="password" min="1" id="password1" name="form[password1]" class="form-control" placeholder="Enter password" value="{{value($form['password1'])}}" />
          </div>
          <div class="col">
            <label for="password">Verify password</label>
            <input type="password" min="1" id="password2" name="form[password2]" class="form-control" placeholder="Re-enter password" value="{{value($form['password2'])}}" />
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="profile">Describe yourself</label>
        <textarea type="password" min="1" id="profile" name="form[profile]" class="form-control" rows="12" placeholder="Describe yourself to other users">{{{value($form['profile'])}}}</textarea>
      </div>
      <div class="form-group">
        <label for="photo">Add a photo avatar:</label>
        <input type="file" accept="image" name="photo" />
      </div>
      <div class="form-group mt-4">
        <div class="btn-toolbar align-middle">
          <button type="submit" class="btn btn-primary mr-1 d-flex justify-content-center align-content-between"><span class="material-icons">send</span>&nbsp;Submit</button>
          <button class="btn btn-secondary mr-1 d-flex justify-content-center align-content-between" onclick="get('@@index@@')"><span class="material-icons">cancel</span>&nbsp;Cancel</button>
[[ if (isLoggedIn()): ]]
          <button class="btn btn-danger mr-1 d-flex justify-content-center align-content-between" onclick="return confirm_delete()"><span class="material-icons">delete_forever</span>&nbsp;Delete account</button>
[[ endif; ]]
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
  function confirm_delete() {
    var result = confirm("Are you sure you want to delete your account? This action cannot be undone.");
    if (result) {
      post('@@user/delete/{{$_SESSION['user']['id']}}@@');
    }
    return false;
  }
</script>
            
%% views/footer.html %%
