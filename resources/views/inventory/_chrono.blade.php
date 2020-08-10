<li class="list-group-item">
    <a class="card-title h5 collapse-title"  data-toggle="collapse" href="#openChronoForm"> Open Box</a>
    <div id="openChronoForm" class="collapse">
        {!! Form::hidden('tag', $tag->tag) !!}
        <p>This action is not reversible. Are you sure you want to label this shard?</p>
        <div class="text-right">
            {!! Form::button('Open', ['class' => 'btn btn-primary', 'name' => 'action', 'value' => 'act', 'type' => 'submit']) !!}
        </div>
    </div>
</li>