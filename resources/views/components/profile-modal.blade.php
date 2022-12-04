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
                <table width="100%" class="">
                    <tr>
                        <td width="35%">NIM</td>
                        <td width="5%">:</td>
                        <td>{{ $data->nim }}</td>
                    </tr>
                    <tr>
                        <td width="35%">Nama</td>
                        <td width="5%">:</td>
                        <td>{{ $data->nama }}</td>
                    </tr>
                    <tr>
                        <td width="35%">Dosen Pembimbing</td>
                        <td width="5%">:</td>
                        <td>{{ $data->dospem }}</td>
                    </tr>
                    <tr>
                        <td width="35%">Ahli Materi</td>
                        <td width="5%">:</td>
                        <td>{{ $data->ahli_materi }}</td>
                    </tr>
                    <tr>
                        <td width="35%">Ahli Media</td>
                        <td width="5%">:</td>
                        <td>{{ $data->ahli_media }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
