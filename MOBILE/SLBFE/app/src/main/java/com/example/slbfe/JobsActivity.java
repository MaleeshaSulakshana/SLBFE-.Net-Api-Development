package com.example.slbfe;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.ListView;
import android.widget.TextView;

import java.util.ArrayList;

public class JobsActivity extends AppCompatActivity {

    private ListView jobList;

    private ArrayList<Job> jobArrayList = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_jobs);

        jobList = (ListView) this.findViewById(R.id.jobList);

        showJobs();

        jobList.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int i, long id) {
                Intent intent = new Intent(JobsActivity.this, JobDetailsActivity.class);
                intent.putExtra("id", jobArrayList.get(i).getId());
                startActivity(intent);
            }
        });

    }

    private void showJobs()
    {
        jobArrayList.clear();
        jobList.setAdapter(null);

        JobAdapter jobAdapter = new JobAdapter(this, R.layout.row_job, jobArrayList);
        jobList.setAdapter(jobAdapter);

        jobArrayList.add(new Job(1,"Software Engineer", "WSO2", "Colombo"));
        jobArrayList.add(new Job(2,"Associate Machine Learning Engineer", "Zone24X7", "Colombo"));
        jobArrayList.add(new Job(2,"Trainee Software Engineer", "Virtusa", "Colombo Western"));
        jobAdapter.notifyDataSetChanged();

    }

}

class Job {

    int id;
    String title, company, location;

    public Job(int id, String title, String company, String location) {
        this.id = id;
        this.title = title;
        this.company = company;
        this.location = location;
    }

    public int getId() {
        return id;
    }

    public String getTitle() {
        return title;
    }

    public String getCompany() {
        return company;
    }

    public String getLocation() {
        return location;
    }

}

class JobAdapter extends ArrayAdapter<Job> {

    private Context mContext;
    private int mResource;

    public JobAdapter(@NonNull Context context, int resource, @NonNull ArrayList<Job> objects) {
        super(context, resource, objects);

        this.mContext = context;
        this.mResource = resource;
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
        LayoutInflater layoutInflater = LayoutInflater.from(mContext);
        convertView = layoutInflater.inflate(mResource, parent, false);

        TextView title = (TextView) convertView.findViewById(R.id.title);
        TextView company = (TextView) convertView.findViewById(R.id.company);
        TextView location = (TextView) convertView.findViewById(R.id.location);

        title.setText(getItem(position).getTitle());
        company.setText(getItem(position).getCompany());
        location.setText(getItem(position).getLocation());

        return convertView;
    }

}