
<div class="col-lg-4 col-6 text-left">
    <form  action="{{route('shop.search')}}">
        <div class="input-group">
            <input  type="text" name="search" value="{{ $search }}" placeholder="Search here..." class="form-control">
            <div class="input-group-append">
                <button type="submit">
                <span class="input-group-text bg-transparent text-primary">
                  <i class="fa fa-search"></i>
                </span>
                </button>
            </div>
        </div>
    </form>
</div>
