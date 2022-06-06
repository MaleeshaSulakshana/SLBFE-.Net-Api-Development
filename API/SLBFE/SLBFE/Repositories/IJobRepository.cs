using SLBFE.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Repositories
{
    public interface IJobRepository
    {

        Job GetJob(int id);

        IEnumerable<Job> GetJobs();

        void AddJob(Job Job);

        void UpdateJob(Job Job);

        void DeleteJob(Job Job);

    }
}
