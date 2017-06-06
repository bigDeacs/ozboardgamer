<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/">
    <channel>
        <title>{!! $channel['title'] !!}</title>
        <link>https://ozboardgamer.com</link>
        <description><![CDATA[{!! $channel['description'] !!}]]></description>
        <language>en-us</language>
        <lastBuildDate>{{ $channel['pubdate'] }}</lastBuildDate>
        @foreach($items as $item)
			<item>
				<title><![CDATA[{!! $item['title'] !!}]]></title>
				<link>{{ $item['link'] }}</link>
				<guid>{{ $item['link'] }}</guid>
				<pubDate>{{ $item['pubdate'] }}</pubDate>
				<author>{!! $item['author'] !!}</author>
				<description><![CDATA[{!! $item['description'] !!}]]></description>
				@if (!empty($item['content']))
					<content:encoded><![CDATA[{!! $item['content'] !!}]]></content:encoded>
				@endif			
			</item>
        @endforeach
    </channel>
</rss>