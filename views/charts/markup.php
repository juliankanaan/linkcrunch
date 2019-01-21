



   <div class="card">
  <!-- Custom information -->
  <div class="about">
    <h3>Last week</h3>
    <p class="lead"><span onclick="window.location.href='/dashboard/stats/'" id="views">Views</span> <span onclick="window.location.href='/dashboard/stats/?t=clicks'" id="clicks">Clicks</span> <span onclick="window.location.href='/dashboard/stats/?t=loves'" id="loves">Likes</span> <span onclick="window.location.href='/dashboard/stats/?t=claps'" id="claps">Claps</span></p>
    <p>Total: <? echo $total; ?></p>

    <div class="legends">
      <div class="info">
        <span class="legend legend--this"></span>
        <p>This week</p>
      </div>
      <div class="info">
        <span class="legend legend--prev"></span>
        <p>Previous week</p>
      </div>
    </div>
  </div>

  <!-- Canvas for Chart.js -->
  <canvas id="canvas"></canvas>


  <div class="axis">
    <div class="tick">
      <? echo substr(date('l',strtotime("-7 days")), 0, 3); ?>
      <span class="value value--this"><? echo $minus7; ?></span>
      <span class="value value--prev"><? echo $minus14; ?></span>
    </div>
    <div class="tick">
      <? echo substr(date('l',strtotime("-6 days")), 0, 3); ?>
      <span class="value value--this"><? echo $minus6; ?></span>
      <span class="value value--prev"><? echo $minus13; ?></span>
    </div>
    <div class="tick">
      <? echo substr(date('l',strtotime("-5 days")), 0, 3); ?>
      <span class="value value--this"><? echo $minus5; ?></span>
      <span class="value value--prev"><? echo $minus12; ?></span>
    </div>
    <div class="tick">
      <? echo substr(date('l',strtotime("-4 days")), 0, 3); ?>
      <span class="value value--this"><? echo $minus4; ?></span>
      <span class="value value--prev"><? echo $minus11; ?></span>
    </div>
    <div class="tick">
      <? echo substr(date('l',strtotime("-3 days")), 0, 3); ?>
      <span class="value value--this"><? echo $minus3; ?></span>
      <span class="value value--prev"><? echo $minus10; ?></span>
    </div>
    <div class="tick">
      <? echo substr(date('l',strtotime("-2 days")), 0, 3); ?>
      <span class="value value--this"><? echo $minus2; ?></span>
      <span class="value value--prev"><? echo $minus9; ?></span>
    </div>
    <div class="tick">
      <? echo substr(date('l',strtotime("-1 days")), 0, 3); ?>
      <span class="value value--this"><? echo $minus1; ?></span>
      <span class="value value--prev"><? echo $minus8; ?></span>
    </div>
  </div>
</div>
