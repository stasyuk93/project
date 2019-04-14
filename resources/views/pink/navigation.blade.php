<div class="menu classic">
    <ul id="nav" class="menu">
        @foreach ($menu as $item)
            <li>
                <a href="{{$item['path']}}">{{$item['title']}}</a>
                @isset($item['children'])
                    <ul class="sub-menu">
                        @foreach($item['children'] as $child)
                            <li>
                                <a href="{{$child['path']}}">{{$child['title']}}</a>
                            </li>
                        @endforeach
                    </ul>
                @endisset
            </li>
        @endforeach
    </ul>
</div>