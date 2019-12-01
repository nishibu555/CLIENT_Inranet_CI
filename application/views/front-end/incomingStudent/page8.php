<div class="row justify-content-center" style="margin-top: 30px; margin-bottom: 50px;">
    <div class="col-md-8">
        <table class="table">
            <tr>
                <td><span>What is your main problem, as you see it? </span></td>
                <td><?php  echo $problem_definition->main_problem  ?></td>
            </tr>
            <tr>
                <td><span>What have you done about it? </span></td>
                <td><?php  echo $problem_definition->what_done_about_main_problem ?></td>
            </tr>
            <tr>
                <td><span>What are your greatest needs, in order of priority?</span></td>
                <td><?php  echo $problem_definition->greatest_needs ?></td>
            </tr>
            <tr>
                <td><span>Have you ever been in a program before?</span></td>
                <td><?php  echo $problem_definition->is_in_program_before==1? "Yes" : "No" ?></td>
            </tr>
            <tr>
                <td><span>If Yes, was it Religious or Non-Religious or both?</span></td>
                <td><?php  echo implode(',', unserialize($problem_definition->program_type)); ?></td>
            </tr>
            <tr>
                <td><span>How many programs have you been in before? </span></td>
                <td><?php  echo $problem_definition->programs_been_in_before ?></td>
            </tr>
        </table>
    </div>
</div>
