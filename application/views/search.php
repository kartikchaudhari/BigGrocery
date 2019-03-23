<div class="row">
    <div  id="search-form" class="col-md-8 col-md-offset-2">
        <form action="<?php echo base_url(); ?>products/doSearchProduct/" method="post">
        <div class="input-group" style="margin-bottom: 0px;">
            <input name="search_data" id="search_data" type="text" class="form-control" placeholder="Search on BigGrocery" onkeyup="ajaxSearch();" autocomplete="off">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
          </form>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-sm-8 col-xs-8 col-lg-offset-2">
        <div class="instant-results" style="padding-bottom: 8px;"></div>
    </div>
</div>
<br>