package com.example.slbfe;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.EditText;
import android.widget.TextView;

public class JobDetailsActivity extends AppCompatActivity {

    private TextView title, company, location, description, responsibilities, qualifications, skills, date;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_job_details);

        title = (TextView) this.findViewById(R.id.title);
        company = (TextView) this.findViewById(R.id.company);
        location = (TextView) this.findViewById(R.id.location);
        description = (TextView) this.findViewById(R.id.description);
        responsibilities = (TextView) this.findViewById(R.id.responsibilities);
        qualifications = (TextView) this.findViewById(R.id.qualifications);
        skills = (TextView) this.findViewById(R.id.skills);
        date = (TextView) this.findViewById(R.id.date);

        title.setText("Software Engineer");
        company.setText("WSO2");
        location.setText("Colombo");
        description.setText("Our team expanded. we have new project. There for we looking for good developers");
        responsibilities.setText("Develop software applications");
        qualifications.setText("Software Engineer Degree");
        skills.setText(".Net, Python, Jva, NodeJs, Critical Thinking");
        date.setText("2022-05-10");

    }
}