<section id="webboard-nav-topic-type">
	<div class="row justify-content-md-center">
		<div class="col-md-10 nav-col">
			<div id="nav-boards-wrapper">
				<ul class="nav nav-pills nav-justified nav-boards text-center">
					<li id="subnav-all" @if( $type == 'all') class="active" @endif >
						<a href="/board">
							<span class="board-nav board-all"></span><h4>ALL</h4>
						</a>
					</li>
					<li id="subnav-howto" @if( $type == 'howto') class="active" @endif >
						<a href="/board/howto">
							<span class="board-nav board-howto"></span><h4>HOW TO</h4>
						</a>
					</li>
					<li id="subnav-review" @if( $type == 'review') class="active" @endif >
						<a href="/board/review">
							<span class="board-nav board-review"></span><h4>REVIEW</h4>
						</a>
					</li>
					<li id="subnav-haul" @if( $type == 'haul') class="active" @endif >
						<a href="/board/haul">
							<span class="board-nav board-haul"></span><h4>HAUL</h4>
						</a>
					</li>
					<li id="subnav-story" @if( $type == 'story') class="active" @endif >
						<a href="/board/story">
							<span class="board-nav board-story"></span><h4>STORY TELLING</h4>
						</a>
					</li>
					<li id="subnav-qa" @if( $type == 'qa') class="active" @endif >
						<a href="/board/qa">
							<span class="board-nav board-qa"></span><h4>Q&A</h4>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="bottom-underline-over"></div>
	<input type="hidden" class="board-type-value" value="{$type}">
</section>