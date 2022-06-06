using SLBFE.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Repositories
{
    public interface IOfficerRepository
    {

        Officer GetOfficerByEmail(string email);

        Officer GetOfficer(string id);

        IEnumerable<Officer> GetOfficers();

        void AddOfficer(Officer officer);

        void UpdateOfficer(Officer officer);

        void DeleteOfficer(Officer officer);

    }
}
