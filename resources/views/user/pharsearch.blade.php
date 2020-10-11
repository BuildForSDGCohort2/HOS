@extends('layouts.template')

@section('page-title','Search Patient')

@section('content')

 <h2 class="text-center display-4"></h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="{{ route('parsearchuser') }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Type Reference ID here" name="refid" required>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection

@section('script')

<script type="text/javascript">
  $('document').ready(function(){


  });

</script>

@endsection
