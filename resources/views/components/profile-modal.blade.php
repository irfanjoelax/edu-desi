<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profile Peneliti</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td width="100">NIM</td>
                        <td>:</td>
                        <td>{{ $data->nim }}</td>
                    </tr>
                    <tr>
                        <td width="100">Nama</td>
                        <td>:</td>
                        <td>{{ $data->nama }}</td>
                    </tr>
                    <tr>
                        <td width="100">Ahli Materi</td>
                        <td>:</td>
                        <td>{{ $data->ahli_materi }}</td>
                    </tr>
                    <tr>
                        <td width="100">Ahli Media</td>
                        <td>:</td>
                        <td>{{ $data->ahli_media }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
