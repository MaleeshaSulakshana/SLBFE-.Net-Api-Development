using Microsoft.EntityFrameworkCore;
using SLBFE.Contexts;
using SLBFE.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Repositories
{
    public class JobRepository : IJobRepository
    {

        protected ModelsDbContext _context;

        public JobRepository(ModelsDbContext context)
        {
            _context = context;
        }

        public Job GetJob(int id)
        {
            return _context.Job.AsNoTracking().FirstOrDefault(c => c.JobId == id);
        }

        public IEnumerable<Job> GetJobs()
        {
            return _context.Job.AsNoTracking().ToList();
        }

        public void AddJob(Job Job)
        {
            _context.Job.Add(Job);
            _context.SaveChanges();
        }

        public void DeleteJob(Job Job)
        {
            _context.Remove(Job);
            _context.SaveChanges();
        }

        public void UpdateJob(Job Job)
        {
            _context.Entry(Job).State = EntityState.Modified;
            _context.SaveChanges();
        }

    }
}
