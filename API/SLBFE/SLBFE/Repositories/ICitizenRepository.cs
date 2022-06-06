using SLBFE.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Repositories
{
    public interface ICitizenRepository
    {

        Citizen GetCitizen(string nid);

        IEnumerable<Citizen> GetCitizens();

        IEnumerable<Citizen> GetCitizensByQualifications(string qualifications);

        void AddCitizen(Citizen citizen);

        void UpdateCitizen(Citizen citizen);
        
        void DeleteCitizen(Citizen citizen);


    }
}
