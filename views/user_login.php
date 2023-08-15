%% views/header.html %%

<div class="row">
  <div class="col-lg-12">

    <form action="@@user/login@@" method="post">
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="text" min="1" id="email" name="form[email]" class="form-control" placeholder="Enter email address or username" value="{{value($form['email'])}}" />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" min="1" id="password" name="form[password]" class="form-control" placeholder="Enter password" value="{{value($form['password'])}}" />
      </div>
      <div class="form-group mt-4">
        <div class="btn-toolbar align-middle">
          <button type="submit" class="btn btn-primary mr-1 d-flex justify-content-center align-content-between"><span class="material-icons">send</span>&nbsp;Submit</button>
          <button class="btn btn-secondary mr-1 d-flex justify-content-center align-content-between" onclick="get('@@index@@')"><span class="material-icons">cancel</span>&nbsp;Cancel</button>
        </div>
      </div>
    </form>
    New here? You can <a href="@@user/register@@">create an account</a>.
  </div>
</div>
<script type="text/javascript">
  $('#email').focus();
</script>
%% views/footer.html %%
