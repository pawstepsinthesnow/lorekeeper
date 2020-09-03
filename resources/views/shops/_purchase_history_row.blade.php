<tr class="outflow">
    <td>{!! $log->item ? $log->item->displayName : '(Deleted Item)' !!}</td>
    <td>{!! $log->quantity !!}</td>
    <td>{!! $log->currency ? $log->currency->display($log->cost) : $log->cost . ' (Deleted Currency)' !!}</td>
    <td>{!! $log->shop->displayName !!}</td>
    <td>{!! $log->character_id ? $log->character->displayName : '' !!}</td>
    <td>{!! format_date($log->created_at) !!}</td>
</tr>