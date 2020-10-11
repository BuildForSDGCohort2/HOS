<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('OPD UNIT') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               {{--  <x-jet-welcome /> --}}
              <form method="post" action="">
                    <div class="form-group">
                                <div class="col-sm-5">
                                    <input type="text" id="prefs" name="prefs" placeholder="REFERENCE NUMBER TO SEARCH" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                 <input type="submit" style="background-color: #42327a;border-color: #42327a;" name="searchs" id="searchs" class="btn btn-success pull-right"value="search" />          
                                </div>  
                                <div class="col-md-2">
                                    <input type="button" class="btn btn-danger" value="Clear" id="clear">
                                </div>
                                <div class="col-md-2">
                                    <input type="button" class="btn btn-danger" value="Delete" id="delect">
                                </div>
                            </div>
               </form>
      
        <form method="post" action="" id="submitNurse">
          <div class="form-group">
                <input class="form-control" style="color: red;" type="text" name="Studpref" id="Studpref" placeholder="Patient's RefID" required />
            </div>
            <div class="form-group">
                <input class="form-control" style="color: red;" type="text" name="precardid" value="REG" id="precardid" placeholder="Patient's CARDID" required />
            </div>
            
            <div class="form-group">
                <input class="form-control" type="text" name="prefname" id="prefname" placeholder="Patient's FirstName"  />
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="prefoname"id="prefoname" placeholder="Patient's OtherNames"  />
            </div>
            
            <div class="form-group">
                <input class="form-control" type="number" name="prefcnumb" id="prefcnumb" placeholder="Patient's Contact Number"  />
            </div>
            <div class="form-group">
                <input class="form-control" type="number" name="preftmpe" id="preftmpe" placeholder="Patient's Temperature"  />
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="prefheig" id="prefheig" placeholder="Patient's height"  />
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="prefweig" id="prefweig" placeholder="Patient's Weight"  />
            </div>
            <div class="form-group">
                <input class="form-control" type="number" name="prefbp" id="prefbp" placeholder="Patient's BP"  />
            </div>
            <div class="form-group">
                <input class="form-control" type="number" name="prefage" id="prefage" placeholder="Patient's Age"  />
            </div>
            <label style="color:;">Patient's Date of Birth</label>
            <div class="form-group">
                <input class="form-control" type="date" name="prefwei" id="prefwei"  />
            </div>
                
                        <div class="form-group">
                            <select class="form-control" name="opt" id="opt" style="width:200px" >
                            <option value="">Room Number</<option>
                            <option value="ROOM 1">Room 1</<option>
                            <option value="ROOM 2">Room 2 </<option>
                            <option value="ROOM 3">Room 3 </<option>
                            </select>
                        </div>

            <div class="form-group">
                <textarea class="form-control" id="prefpissue" name="prefpissue"placeholder="Enter Patient's issue" style="resize:none;"></textarea>
            </div>
            <input type="submit" style="background-color: #d8bc35;border-color: #d8bc35;" name="send" id="send" class="btn btn-sm btn-success pull-right"value="Submit" />
        </form>
               
    </div>
</x-app-layout>
