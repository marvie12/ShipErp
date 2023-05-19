<section class="bg-light py-5" id="providers">
    <div class="container px-5 pb-3">
        <div class="row gx-5 align-items-center">
            <div class="col">
                <div class="badge bg-gradient-primary-to-secondary text-white px-3 py-2">
                    <div class="text-uppercase">Providers</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-5">
        <table id="tblProvider" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Provider Name</th>
                    <th>Provider URL</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($providerLists as $key => $provider)                
                <tr>
                    <td>{{$provider['name']}}</td>
                    <td>{{$provider['url']}}</td>
                    <td align="center"><div class="viewImage fs-5" title="View" data-src="{{$provider['url']}}"><i class="fas fa-eye"></i></div></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>