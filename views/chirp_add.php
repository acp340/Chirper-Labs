%% views/header.html %%

<div class="row">
  <div class="col-lg-12">

    <form action="@@chirp/add@@" method="post">
      <div class="form-group">
        <label for="content">Chirp Content</label>
        <textarea class="form-control" id="chirp_content" name="chirp_content" placeholder="Enter content" rows="12">{{$chirp['chirp_content']}}</textarea>
      </div>
      <div class="form-group">
        <div class="btn-toolbar align-middle">
          <button type="submit" class="btn btn-primary mr-1 d-flex justify-content-center align-content-between"><span class="material-icons">send</span>&nbsp;Send Chirp</button>
          <button class="btn btn-secondary mr-1 d-flex justify-content-center align-content-between" onclick="get('@@index@@')"><span class="material-icons">cancel</span>&nbsp;Cancel</button>
        </div>
      </div>
      <input type="hidden" id="datestamp" name="datestamp" value="{{$chirp['datestamp']}}" />
    </form>
  </div>
</div>

%% views/footer.html %%
