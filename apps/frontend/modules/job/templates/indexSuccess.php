<div id="jobs">
  <table class="jobs">
    <?php foreach ($jobeet_jobs as $i => $job): ?>
      <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
        <td class="location"><?php echo $job->getLocation() ?></td>
        <td class="position">
          <!-- link method 1 : <a href="<?php echo url_for('job/show?id='.$job->getId()) ?>"><?php echo $job->getPosition() ?></a>-->
          <!-- link method 2 : <a href="<?php echo url_for('job/show?id='.$job->getId().'&compagny='.$job->getCompany().'&location='.$job->getLocation().'&position='.$job->getPosition()) ?>"><?php echo $job->getPosition() ?></a>-->
	  <!-- link method 3 : -->
	  <?php echo link_to($job->getPosition(), 'job_show_user', $job); ?>

	</td>
        <td class="company"><?php echo $job->getCompany() ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
