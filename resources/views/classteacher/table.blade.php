<table class="table table-striped text-small-on-mobile">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kelas</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($presents as $present)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$present->teacher_p}}</td>
                <td><a href=" " type="button" class="btn btn-warning text-small-on-mobile">Detail</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
