{!! '<'.'?'.'xml version="1.0" encoding="UTF-8" ?>' !!}
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/">
    <channel>
        <title>{!! $channel['title'] !!}</title>
        <link>{{ $channel['rssLink'] }}</link>
        <description>
			<![CDATA[{!! $channel['description'] !!}]]>
		</description>
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
					<content:encoded>
						<![CDATA[
							<!doctype html>
							<html lang="en" prefix="op: http://media.facebook.com/op#">
							  <head>
								<meta charset="utf-8">
								<link rel="canonical" href="{{ $item['link'] }}">
								<meta property="fb:article_style" content="OzBoardGamer">
								<meta property="op:markup_version" content="v1.0">
							  </head>
							  <body>
								<article>									
									{!! $item['content'] !!}
								</article>
							  </body>
							</html>
						]]>
					</content:encoded>
				@endif		
			</item>
        @endforeach
    </channel>
</rss>