<section id="webboard-nav-topic-type">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10 nav-col">
				<div id="nav-boards-wrapper">
					<ul class="nav nav-pills nav-justified nav-boards text-center">
						<li id="subnav-all" @if( $type == '') class="active" @endif >
							<a href="/board">
								<span class="board-nav board-all"></span><h4>All</h4>
							</a>
						</li>
						<li id="subnav-qa" @if( $type == 'question') class="active" @endif >
							<a href="/board/question">
								<span class="board-nav board-qa"></span><h4>ถาม-ตอบ</h4>
							</a>
						</li>
						<li id="subnav-howto" @if( $type == 'howto') class="active" @endif >
							<a href="/board/howto">
								<span class="board-nav board-howto"></span><h4>ฮาวทู</h4>
							</a>
						</li>
						<li id="subnav-review" @if( $type == 'review') class="active" @endif >
							<a href="/board/review">
								<span class="board-nav board-review"></span><h4>รีวิว</h4>
							</a>
						</li>
						<li id="subnav-hual" @if( $type == 'haul') class="active" @endif >
							<a href="/board/haul">
								<span class="board-nav board-haul"></span><h4>เห่อ</h4>
							</a>
						</li>
						<li id="subnav-others" @if( $type == 'story') class="active" @endif >
							<a href="/board/story">
								<span class="board-nav board-others"></span><h4>อื่นๆ</h4>
							</a>
						</li>
						<li id="subnav-jeban">
							<a href="http://www.jeban.com" target="_blank">
								<span class="board-nav board-jeban"></span><h4>Jeban.com</h4>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="bottom-underline-over"></div>
	<input type="hidden" class="board-type-value" value="{$type}">
</section>