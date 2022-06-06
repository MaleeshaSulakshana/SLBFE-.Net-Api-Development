package com.example.slbfe;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class DashboardActivity extends AppCompatActivity {

    private Button btnJobs, btnProfile, btnChangePsw, btnLogout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dashboard);

        btnJobs = this.findViewById(R.id.btnJobs);
        btnProfile = this.findViewById(R.id.btnProfile);
        btnChangePsw = this.findViewById(R.id.btnChangePsw);

        btnJobs.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent intent = new Intent(DashboardActivity.this, JobsActivity.class);
                startActivity(intent);

            }
        });

        btnProfile.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent intent = new Intent(DashboardActivity.this, JobsActivity.class);
                startActivity(intent);

            }
        });

        btnChangePsw.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent intent = new Intent(DashboardActivity.this, JobsActivity.class);
                startActivity(intent);

            }
        });

    }
}