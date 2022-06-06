using SLBFE.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SLBFE.Repositories
{
    public interface IComplainRepository
    {

        Complain GetComplain(int id);

        IEnumerable<Complain> GetComplainByNid(string id);

        IEnumerable<Complain> GetComplains();

        void AddComplain(Complain complain);

        void UpdateComplainReply(Complain complain);

    }
}
