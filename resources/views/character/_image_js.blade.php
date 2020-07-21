<script>
    $(document).ready(function() {
        $('.edit-features').on('click', function(e) {
            e.preventDefault();
            loadModal("{{ url('admin/character/image') }}/"+$(this).data('id')+"/traits", 'Edit Traits');
        });
        $('.edit-notes').on('click', function(e) {
            e.preventDefault();
            $( "div.imagenoteseditingparse" ).load("{{ url('admin/character/image') }}/"+$(this).data('id')+"/notes", 'Edit Image Notes');
            $( "div.imagenoteseditingparse" ).attr('id', 'modal');
            $( ".edit-notes" ).remove();
            //loadModal("{{ url('admin/character/image') }}/"+$(this).data('id')+"/notes", 'Edit Image Notes');
        });
        $('.edit-credits').on('click', function(e) {
            e.preventDefault();
            loadModal("{{ url('admin/character/image') }}/"+$(this).data('id')+"/credits", 'Edit Image Credits');
        });
        $('.edit-credits').on('click', function(e) {
            e.preventDefault();
            loadModal("{{ url('admin/character/image') }}/"+$(this).data('id')+"/credits", 'Edit Image Credits');
        });
        $('.reupload-image').on('click', function(e) {
            e.preventDefault();
            loadModal("{{ url('admin/character/image') }}/"+$(this).data('id')+"/reupload", 'Reupload Image');
        });
        $('.active-image').on('click', function(e) {
            e.preventDefault();
            loadModal("{{ url('admin/character/image') }}/"+$(this).data('id')+"/active", 'Set Active');
        });
        $('.delete-image').on('click', function(e) {
            e.preventDefault();
            loadModal("{{ url('admin/character/image') }}/"+$(this).data('id')+"/delete", 'Delete Image');
        });
        $('.edit-stats').on('click', function(e) {
            e.preventDefault();
            loadModal("{{ url($character->is_myo_slot ? 'admin/myo/' : 'admin/character/') }}/"+$(this).data('{{ $character->is_myo_slot ? 'id' : 'slug' }}')+"/stats", 'Edit Character Stats');
        });
        $('.edit-description').on('click', function(e) {
            e.preventDefault();
            $( "div.descriptioneditingparse" ).load("{{ url($character->is_myo_slot ? 'admin/myo/' : 'admin/character/') }}/"+$(this).data('{{ $character->is_myo_slot ? 'id' : 'slug' }}')+"/description", 'Edit Description');
            $( "div.descriptioneditingparse" ).attr('id', 'modal');
            $( ".edit-description" ).remove();
            //loadModal("{{ url($character->is_myo_slot ? 'admin/myo/' : 'admin/character/') }}/"+$(this).data('{{ $character->is_myo_slot ? 'id' : 'slug' }}')+"/description", 'Edit Description');
        });
        $('.delete-character').on('click', function(e) {
            e.preventDefault();
            loadModal("{{ url($character->is_myo_slot ? 'admin/myo/' : 'admin/character/') }}/"+$(this).data('{{ $character->is_myo_slot ? 'id' : 'slug' }}')+"/delete", 'Delete Character');
        });

    });
</script>