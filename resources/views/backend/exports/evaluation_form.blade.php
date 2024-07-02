<!DOCTYPE html>
<html>

<head>
    <title>Internship Program</title>
    <style>
        body {
            font-family: 'Time New Roman', sans-serif;
        }

        .container {
            width: 100%;
            padding: 20px;
            border: 1px solid #000;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }


        .details {
            font-size: 20px;
            width: 100%;
            margin-bottom: 20px;
        }

        .rating,
        .rating td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
        }

        /* .rating .date {
            width: 200px;
        } */

        .rating .characteristics {
            width: 500px;
        }

        .signature {
            display: flex;
            justify-content: end;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h4>Evaluation of Internship Student</h4>
        </div>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Purpose of this form is to provide feedback on student performance and during the internship program.The supervisor who monitors the student’s performance during this period should fill out the form and mail this appraisal form to the {{ $evaluation->intern->university->name }},Supervisor or place it in a sealed envelope and give it to the student to bring it back to the {{ $evaluation->intern->university->name }}. Your intern student will not receive credit until this form is completed and returned.</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The supervisor should evaluate the student objectively with other student of a comparable academic level,with other personnel assigned to the same (or to similarly classified) jobs, or with individual standards. </p>
        <div class="header">
            <h4>Student Appraisal Form/ Evaluation of Internship Student</h4>
        </div>
        <div class="details">
            <h6>Student Name: {{ $internName }}<span>({{ $evaluation->intern->roll_no }})</span></h6>
            <h6>Company\Organization Name.: {{ $evaluation->company_supervisor->company->name }}</h6>
            <h6>Period : {{ $evaluation->period }}</h6>
            <h6>Total leaves taken: {{ $evaluation->leaves_day }}</h6>
        </div>
        <p> 1. Please rate the intern student on the following characteristics by checking box which most represents
            your evaluation.<br>
            &nbsp;&nbsp;&nbsp;&nbsp;Not Observe = Never demonstrates this ability/does not meet expectations <br>
            &nbsp;&nbsp;&nbsp;&nbsp;Poor = Improvement Seldom demonstrates this ability/rarely few times meets
            &nbsp;&nbsp;&nbsp;&nbsp;expectations <br>
            &nbsp;&nbsp;&nbsp;&nbsp;Less than Avg = Sometimes demonstrates this ability/only few times meets
            &nbsp;&nbsp;&nbsp;&nbsp;expectations <br>
            &nbsp;&nbsp;&nbsp;&nbsp;Average = Sometimes demonstrates this ability/sometimes exceed
            &nbsp;&nbsp;&nbsp;&nbsp;expectations <br>
            &nbsp;&nbsp;&nbsp;&nbsp;Above Average = Usually demonstrates this ability/consistently exceed
            &nbsp;&nbsp;&nbsp;&nbsp;expectations <br>
            &nbsp;&nbsp;&nbsp;&nbsp;Excellent = Always demonstrates this ability/consistently exceed
            &nbsp;&nbsp;&nbsp;&nbsp;expectations <br>
        </p>
        <table class="rating">
            <thead>
                <tr>
                    <th class="no">No.</th>
                    <th class="characteristics">Characteristics</th>
                    <th class="rating">Rating</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td><b>Maintained contact with supervisor</b></td>
                    <td>{{ $evaluation->contact_supervisor ?? '--' }}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><b>Punctual for works, appointments and attendance</b></td>
                    <td>{{ $evaluation->punctual ?? '--' }}</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><b>Reliably performed all job assignments</b> <br>
                        -Perform the duties expected of
                        him/her <br>
                        -Done all assign work
                    </td>
                    <td>{{ $evaluation->reliably_performed_assignments ?? '--' }}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><b>Ability to solve problem</b><br>
                        -Seeks to comprehend and understand the “big picture” <br>
                        -Breaks down complex tasks/problems into manageable pieces <br>
                        -Brainstorms/ develops options and ideas <br>
                        -Respects input and ideas from other sources and people
                    </td>
                    <td>{{ $evaluation->ability_solve_problem ?? '--' }}</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><b>Organization skills</b><br>
                        -Interacts effectively and appropriately with supervisor <br>
                        -Demonstrates a sense of responsibility and confidentiality <br>
                        -Fits in with the norms and expectations of the organization
                    </td>
                    <td>{{ $evaluation->organization_skills ?? '--' }}</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td><b>Communication Skills</b><br>
                        -Ability to work well with co-workers, clients and the public<br>
                        -Effectively participates in meetings or group meeting <br>
                        -Manages and resolves conflicts in an effective manner
                    </td>
                    <td>{{ $evaluation->communication_skills ?? '--' }}</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td><b>Ability to work independently</b></td>
                    <td>{{ $evaluation->ability_work_independently ?? '--' }}</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td><b>Willingness to learn new tasks</b> <br>
                        -Accepts reasonability for mistakes and
                        learns from experiences <br>
                        -Open to new experiences; takes appropriate risks
                    </td>
                    <td>{{ $evaluation->willingness_learn_new_tasks ?? '--' }}</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td><b>Eagerness to learn</b> <br>
                        -Observes and/or pays attention to
                        others <br>
                        -Observes and/or pays attention to others <br>
                        -Seeks out and utilities appropriate resources
                    </td>
                    <td>{{ $evaluation->eagerness_to_learn ?? '--' }}</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td><b>Basic Skill</b> <br>
                        -Technical Skill <br>
                        -Programming or respected Skill
                    </td>
                    <td>{{ $evaluation->basic_skill ?? '--' }}</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td><b>Professional appearance</b> <br>
                        -Seeks to understand personal strengths and weaknesses <br>
                        -Exhibits self-motivated approach to work <br>
                        -Demonstrates ability to set appropriate priorities/goals <br>
                        -Manages personal expectations consistent with work role <br>
                        -Shows interest in determining career direction <br>
                        -Behaves in an ethical and professional manner
                    </td>
                    <td>{{ $evaluation->professional_appearance ?? '--' }}</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td><b>Overall assessment of work quality</b></td>
                    <td>{{ $evaluation->overall_assessment_work_quality ?? '--' }}</td>
                </tr>
            </tbody>
        </table>
        <div>
            <p>2. Please describe the work / tasks that the student accomplished and how well did the student perform
                these tasks form a professional view point.</p>
            <textarea name="professional_viewpoint" id="professional_viewpoint" cols="90" rows="3">{{ $evaluation->professional_viewpoint }}</textarea>
        </div>
        <div>
            <p>3. Any additional comments on the student eg. About the intern’s work characteristics, technical
                Knowledge and skills, ability to adapt to work environment / hardware / software etc.
            </p>
            <textarea name="comments_student" id="comments_student" cols="90" rows="3">{{ $evaluation->comments_student }}</textarea>
        </div>
        <div>
            <p> 4. Any Comments on the internship program. Your suggestions for improving {{ $universityName }}
                Internship program. Eg. Technical knowledge and skills, academic / curricular preparation, methodology,
                programming, networking etc., to include in our curriculum to best prepare our students for the
                industry.</p>
            <textarea name="comments_intership" id="comments_intership" cols="90" rows="3">{{ $evaluation->comments_intership }}</textarea>
        </div>
        <div>
            <p>5. Other Comments </p>
            <textarea name="comments" id="comments" cols="90" rows="3">{{ $evaluation->comments }}</textarea>
        </div>
        <div>
            <p>6. This report has been discussed with the student intern:</p>
            {{ $evaluation->discuss_intern ?? '--' }}
        </div>
        <div>
            <h4>Supervisor Name: {{ $supervisor }}</h4>
        </div>
        <div class="signature">
            <div>
                <h4>Signature:</h4>........................................................
            </div>
            <div>
                {{-- <h4>Supervisor Title: {{ $evaluation->company_supervisor->position }}</h4> --}}
            <h4>Supervisor Title: {{ $title }}</h4>

            </div>
            <div>
                <h4>Company Address: {{ $evaluation->company->address }}</h4>
            </div>
            <div>
                <h4>Contact: {{ $evaluation->contact }}</h4>
            </div>
        </div>
</body>

</html>
