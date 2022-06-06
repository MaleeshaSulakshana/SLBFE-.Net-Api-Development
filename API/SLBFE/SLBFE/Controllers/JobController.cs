using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using SLBFE.Models;
using SLBFE.Repositories;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Controllers
{
    [Route("api/job")]
    [ApiController]
    public class JobController : ControllerBase
    {

        private readonly IJobRepository _jobRepository;

        public JobController(IJobRepository jobRepository)
        {
            _jobRepository = jobRepository;
        }

        /* For get all jobs */
        [HttpGet]
        public IEnumerable<Job> GetJobs()
        {
            return _jobRepository.GetJobs().ToList();
        }

        /* For get job details */
        [HttpGet("{id}")]
        public ActionResult<Job> GetJob(int id)
        {
            var jobz = _jobRepository.GetJob(id);
            if (jobz is null) return NotFound(new { message = "Not Found" });
            return jobz;
        }

        /* For insert job */
        [Authorize]
        [HttpPost("")]
        public ActionResult<Job> AddJob(Job job)
        {
            _jobRepository.AddJob(job);
            return Created(nameof(GetJob), new { message = "Added successfull" });
        }

        /* For update job details */
        [Authorize]
        [HttpPut("{id}")]
        public ActionResult<Job> UpdateJob(int id, Job job)
        {
            var jobz = _jobRepository.GetJob(id);
            if (jobz is null) return NotFound(new { message = "Not Found" });

            jobz.Title = job.Title;
            jobz.Company = job.Company;
            jobz.Location = job.Location;
            jobz.Description = job.Description;
            jobz.Responsibilities = job.Responsibilities;
            jobz.Qualifications = job.Qualifications;
            jobz.Skills = job.Skills;

            _jobRepository.UpdateJob(jobz);
            return Ok(new { message = "Update successfull" });
        }

        /* For delete job details */
        [Authorize]
        [HttpDelete("{id}")]
        public ActionResult<Job> DeleteCompany(int id)
        {
            var jobz = _jobRepository.GetJob(id);
            if (jobz is null) return NotFound(new { message = "Not Found" });

            _jobRepository.DeleteJob(jobz);
            return Ok(new { message = "Remove successfull" });
        }

    }
}
